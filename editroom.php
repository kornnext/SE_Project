<?php
include('conn.php');

if (isset($_POST['submit_edit'])) {
	$sql = "SELECT * FROM room WHERE room.roomname = '" . $_POST['roomname'] . "' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '<script>alert("ห้องประชุมชื่อนี้ มีในระบบแล้ว กรุณาใช้ชื่ออื่น") </script> ';
		echo "<script>window.open('addroom.php','_self')</script>";
	} else {
		$roomid = $_GET['roomid'];

		$roomname = $_POST['roomname'];
		$location = $_POST['location'];
		$capacity = $_POST['capacity'];
		$projector = $_POST['projector'];
		$microphone = $_POST['microphone'];
		$other = $_POST['other'];


		mysqli_query($conn, "UPDATE room 
							SET roomname='$roomname', location='$location', capacity='$capacity', projector='$projector', microphone='$microphone', other='$other' 
							WHERE roomid='$roomid'");
		header('location:addroom.php');
	}
} else {
	echo '<script>alert("ERROR") </script> ';
	echo "<script>window.open('addroom.php','_self')</script>";
}
