<?php
require_once("dbconfig.php");
if (stristr(htmlentities($_SERVER['PHP_SELF']), "database.php")) {
	   Header("Location: ../index.php");
    die();
}
if (stristr(htmlentities($_SERVER['PHP_SELF']), "dbconfig.php")) {
	   Header("Location: ../index.php");
    die();
}
//#DB connection
$db = new PDO("mysql:dbname=".$dbname.";host=".$dbhost, $dbuname, $dbpass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class API{
	
	#returning all tags with reputation number
	public function get_tags()
	{
		global $db;
		$sql = "SELECT tag, count(tqid) as num FROM jo_tags INNER JOIN jo_tq ON jo_tags.tid=jo_tq.tid GROUP BY tag ORDER BY num DESC ";
		$rows = $db->query($sql);
		return $rows;
	}

	#returning given tag related questions
	public function click_tag($tag)
	{
		global $db;

		$sql = "SELECT tid FROM jo_tags WHERE tag = " . $db->quote($tag);
		$rows = $db->query($sql);
		if(isset($rows) && $rows->rowCount() > 0){
			foreach($rows as $row){
					$tid = $row["tid"];
			}

		$sql = "SELECT tag, question, added FROM jo_tags JOIN jo_tq ON jo_tags.tid=jo_tq.tid JOIN jo_questions on jo_tq.qid=jo_questions.qid 
				WHERE jo_tq.qid in (select qid from jo_tq WHERE tid = '$tid') ORDER BY added DESC";
		$rows = $db->query($sql);
		return $rows;

		} else return null;

				
	}

	#returning tag related questions
	public function get_question($tag){
		global $db;

		$sql = "SELECT tid FROM jo_tags WHERE tag = " . $db->quote($tag);
		$rows = $db->query($sql);
		if(isset($rows) && $rows->rowCount() > 0){
			foreach($rows as $row){
					$tid = $row["tid"];
			}

		$sql = "SELECT question, count(added) as added FROM jo_tags JOIN jo_tq ON jo_tags.tid=jo_tq.tid JOIN jo_questions on jo_tq.qid=jo_questions.qid 
				WHERE jo_tq.qid in (select qid from jo_tq WHERE tid = '$tid') group by question";
		$rows = $db->query($sql);
		return $rows;

		} else return null;

		
	}

	#inserting question with tags
	public function insert_question($question, $tags){
		global $db;
		if(strlen($question)>0)
		{
			$sql = "INSERT INTO jo_questions VALUES(NULL, :question, :added)";
			try{
				$stmt = $db->prepare($sql);
				$stmt->execute(array(':question'=>$question,
									':added'=>date('Y-m-d')));
				if($stmt->rowCount() > 0)
				{
					$qid =  $db->lastInsertId();
					if(is_array($tags))
					{
						foreach($tags as $tag)
						{
							if(strlen($tag))
							{

								$tid = self::check_insert_tag($tag);

								$sql = "INSERT INTO jo_tq VALUES(NULL, :tid, :qid)";
								$stmt = $db->prepare($sql);
								$stmt->execute(array(':tid'=>$tid,  
													 ':qid'=>$qid));	
							}
						}
					}
					else {
						if(strlen($tag))
						{
							$tid = self::check_insert_tag($tags);			

							$sql = "INSERT INTO jo_tq VALUES(NULL, :tid, :qid)";
							$stmt = $db->prepare($sql);
							$stmt->execute(array(':tid'=>$tid,  
												 ':qid'=>$qid));
						}
					}	

				}
				else 
				{
					return FALSE;
				}
			}
			catch(PDOException $ex){
				#return $ex->getMessage();
				return FALSE;
			}
		}
	}

	#checkin tag and if no tag inserting it
	public function check_insert_tag($tag)
	{
		global $db;
		$tag = trim($tag);

		$sql = "SELECT tid FROM jo_tags WHERE tag = " . $db->quote($tag);
		$rows = $db->query($sql);
		if(isset($rows) && $rows->rowCount() > 0){
			foreach($rows as $row){
				$tid = $row["tid"];
			}
		}
		else
		{	$sql = "INSERT INTO jo_tags VALUES(NULL, :tag)";
			$stmt = $db->prepare($sql);
			$stmt->execute(array(':tag'=>$tag));
			if($stmt->rowCount() > 0)
			{
				$tid =  $db->lastInsertId();
			}
		}
		return $tid;
	}

}

$api = new API();

?>