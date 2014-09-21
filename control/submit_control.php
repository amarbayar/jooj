<?php

require_once('connect.php');

		//$tags = $_POST["tags"];
		
		//$question = $_POST["iquestion"];


		//$type = $_POST["itype"];
		$type = "skype";
		
		$tags = array("google", "microsoft", "infosys", "logic");
		//$tags = array("micros");
		array_push($tags,$type);
		//var_dump($tags);

		$question = "how much snow drops in Seatle";
		mysqli_query($con,"INSERT INTO questions (question ) VALUES ('$question')");
		$qid = $con->insert_id;
		//echo $qid;

		

		foreach ($tags as $tag) {

			$tagExist = findTag($tag);
			if ($tagExist>0) {

			$tid = $tagExist; 

			} else {

			mysqli_query($con,"INSERT INTO tags (tag) VALUES ('$tag')");
			$tid = $con->insert_id; 
			}
			
			
			mysqli_query($con,"INSERT INTO qt (qt_question, qt_tag ) VALUES ('$qid','$tid')");
			
		}

		mysqli_close($con);



function findTag($tag){
	
	
	require('connect.php');
	if ($result = $con->query("SELECT tid from tags WHERE tag = '$tag'")){
		$row = mysqli_fetch_array($result); 
		return $row['tid']; 
		}
		else return 0;

	};
?>