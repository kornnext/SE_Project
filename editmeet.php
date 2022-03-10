<?php
	include('conn.php');
	
	$roomid=$_GET['roomid'];
	
	$roomname=$_POST['roomname'];
	$location=$_POST['location'];

	
	mysqli_query($conn,"update room set roomname='$roomname', location='$location' where roomid='$roomid'");
	header('location:addroom.php');

?>