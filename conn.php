<?php

date_default_timezone_set("Asia/Bangkok");
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","meeting");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
