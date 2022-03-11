<?php
	include('conn.php');

	$meetid = $_GET['meetid'];

	$title = $_POST['title'];
	$numattend = $_POST['numattend'];
	$addequipment = $_POST['addequipment'];
	$remark = $_POST['remark'];


	mysqli_query($conn, "UPDATE meeting 
							SET title='$title', numattend='$numattend', addequipment='$addequipment', remark='$remark' 
							WHERE meetid='$meetid'");
	header('location:addmeet.php');

?>
