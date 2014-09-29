<?php
	include("../model/config.php");
	$tag = $_POST["tag"];
	$rows = $api->click_tag($tag);
	$rows_q = $api->get_question($tag);
	$tags_counted = $api->get_tags();
	include("../view/header_view.html");
	include("../view/question_view.html");
	include("../view/footer_view.html")
?>