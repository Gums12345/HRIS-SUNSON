<?php
$con = mysqli_connect("localhost","gums","gums");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con,"sunson");
?>