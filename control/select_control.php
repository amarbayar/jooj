<?php

		include '../model/config.php';

		//$tag = $_POST["tag"];

class q{
	
	private $qtext;
	var $qdate;
	var $qtags = [];

	function __construct($q)
    {
        $this->$qtext = $q;
    } 


	function tag_add($tag){
		array_push($this->$qtags,$tag);
	}

}


		$tag = "phone";

		$row_array = [];


			$rows = $api->click_tag($tag);
			$rows_q = $api->get_question($tag);

			foreach ($rows_q as $row_q) {
				$temp = new q($row_q);
				array_push($row_array, $temp);
			}


			if(isset($rows) && $rows->rowCount() > 0){
				foreach($rows as $row){
					//echo $row["tag"].":".$row["question"].":".$row["added"]."<br>";
					echo $row["question"];
					$question = $row["question"]; $date = $row["added"];
					
									
				}
			}
			else{
				print "not found";
				return FALSE;
		}



?>