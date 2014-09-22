<?php
	include '../model/config.php';

	$tags_counted = $api->get_tags();
	include("../view/header_view.html");
	include("../view/index_view.html");
	include("../view/footer_view.html")
?>