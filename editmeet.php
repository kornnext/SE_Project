<?php
	include('conn.php');

	$id = $_GET['id'];

	$title = $_POST['title'];
	$numattend = $_POST['numattend'];
	$addequipment = $_POST['addequipment'];
	$remark = $_POST['remark'];


	mysqli_query($conn, "UPDATE events 
							SET title='$title', numattend='$numattend', addequipment='$addequipment', remark='$remark' 
							WHERE id='$id'");
	header('location:addmeet.php');

?>
