<?php
	include('conn.php');
	$meetid=$_GET['meetid'];
	mysqli_query($conn,"DELETE FROM meeting WHERE meetid='$meetid'");
	header('location:addmeet.php');

?>