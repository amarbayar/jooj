<?php
require_once('../model/database.php');
	$tags = explode(",",$_POST["tags"]);		
	$question = $_POST["iquestion"];
	$type = $_POST["itype"];
	array_push($tags,$type);
	$api->insert_question($question, $tags);
header("Location: index.php");
?>