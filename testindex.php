<?php

include '/model/config.php';
//@require_once("/model/db.php");
	global $db;	
	$rows = $api->get_tags();
	if(isset($rows) && $rows->rowCount() > 0){
				foreach($rows as $row){
					echo $row["tag"].":".$row["num"]."<br>";
				}
			}
			else{
				print "FALSE";
				return FALSE;
	}
	$rows = $api->click_tag("Phone");
	if(isset($rows) && $rows->rowCount() > 0){
				foreach($rows as $row){
					echo $row["tag"].":".$row["question"].":".$row["added"]."<br>";
				}
			}
			else{
				print "FALSE";
				return FALSE;
	}

	$api->insert_question("TEST question","");
?>