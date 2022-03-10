<?php

//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","meeting");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
