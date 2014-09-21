<?php

try {
  $db_server = new PDO("mysql:dbname=jooj", "root", "");
  $db_server->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $con=mysqli_connect("localhost","root","","jooj");
} catch (PDOException $ex) {
  ?>
  <p>Sorry, a database error occurred. Please try again later.</p>
  <p>(Error details: <?= $ex->getMessage() ?>)</p>
  <?php
}



?>