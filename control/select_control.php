<?php



		//$tag = $_POST["tag"];

		$tag = "google";

		select_tag($tag);
function select_tag($tag){
		
		require_once('connect.php');

		if ($result = $con->query("SELECT * from qt inner join questions on qt_question=qid inner join tags on qt_tag=tid WHERE tag like '$tag%'")) {


    		while($row = mysqli_fetch_array($result)) {
  			echo $row['qt_question'] . " " . $row['qt_tag'] . " " . $row['question'] . " " . $row['tag'];
  			echo "<br>";


  			echo json_encode($row);
  			echo "<br>";

  			$founded_question = $row['question'];
  			$founded_tag = $row['tag'];

  			//include("question_view.html");



			}

			
    		$result->close();
		}
		

		$con->close();

		

	}

?>