<?php
	include('conn.php');
	$roomid=$_GET['roomid'];
	mysqli_query($conn,"DELETE FROM room WHERE roomid='$roomid'");
	header('location:addroom.php');


?>
