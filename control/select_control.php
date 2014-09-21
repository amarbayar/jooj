<?php

		include '../model/config.php';

		$tag = $_POST["tag"];

/*
class q{
	
	private $qtext;
	var $qdate;
	var $qtags = [];

	public function __construct($q)
    {
        $this->qtext = $q;
    } 


	public function tag_add($tag){
		array_push($this->$qtags,$tag);
	}

}

*/



		

		//$row_array = [];


			$rows = $api->click_tag($tag);
			$rows_q = $api->get_question($tag);

			include("../view/question_view.html");

			/*foreach ($rows_q as $row_q) {
				$temp = new q($row_q["question"]);
				array_push($row_array, $temp);
			}



			//question1 question2
			//tag1 tag2 tag1
			/*$shop = array( array("rose", 1.25 , 15),
               array("daisy", 0.75 , 25),
               array("orchid", 1.15 , 7) 
             ); /*
             //$new_row = array($row["datasource_id"]=>$row["title"]); 
			$tagarray = [];
			$temp = [];
			foreach($rows as $key => $value)
			{
  			$mykey = $key;
  			$myq = $value["question"];
  			$myt = $value["tag"];
  			//echo $mykey . ":" . $myq . ":" . $myt;

  			//$new_row = array($myq => $myt);
  			//array_push($tagarray, $new_row);


  			//array_push($temp, $myt);
  			//$tagarray[$myq] = $temp;

  			



  			//["question1", "tag1,tag2,tag3", "date1"];
  			//["question2", "tag1, tag2", "date2"];



  			}

			//var_dump($tagarray);
			


			if(isset($rows) && $rows->rowCount() > 0){
				foreach($rows as $row){
					
				
					$question = $row["question"]; $date = $row["added"];
					
									
				}
			}
			
		}

			/*

?>