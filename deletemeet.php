<?php
	include('conn.php');
	$id=$_GET['id'];
	mysqli_query($conn,"DELETE FROM events WHERE id='$id'");
	header('location:addmeet.php');

?>