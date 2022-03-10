<?php
	include('conn.php');
	$roomid=$_GET['roomid'];
	mysqli_query($conn,"delete from room where roomid='$roomid'");
	header('location:addroom.php');

?>