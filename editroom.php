<?php
	include('conn.php');
	
	$roomid=$_GET['roomid'];
	
	$roomname=$_POST['roomname'];
	$location=$_POST['location'];
	$capacity=$_POST['capacity'];
	$projector=$_POST['projector'];
	$microphone=$_POST['microphone'];
	$other=$_POST['other'];

	
	mysqli_query($conn,"update room set roomname='$roomname', location='$location', capacity='$capacity', projector='$projector', microphone='$microphone', other='$other' where roomid='$roomid'");
	header('location:addroom.php');

?>
