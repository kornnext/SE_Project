<?php
	include('conn.php');
	
	$roomid=$_GET['roomid'];
	
	$roomname=$_POST['roomname'];
	$location=$_POST['location'];
	$capacity=$_POST['capacity'];
	$projector=$_POST['projector'];
	$microphone=$_POST['microphone'];
	$other=$_POST['other'];

	
	mysqli_query($conn,"UPDATE room 
						SET roomname='$roomname', location='$location', capacity='$capacity', projector='$projector', microphone='$microphone', other='$other' 
						WHERE roomid='$roomid'");
	header('location:addroom.php');

?>
