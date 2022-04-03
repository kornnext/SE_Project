<?php
include('conn.php');

if (isset($_POST['submit'])) {
	$sql = "SELECT * FROM room WHERE room.roomname = '" . $_POST['roomname'] . "' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '<script>alert("ห้องประชุมชื่อนี้ มีในระบบแล้ว กรุณาใช้ชื่ออื่น") </script> ';
		echo "<script>window.open('addroom.php','_self')</script>";
	} else {
		$roomname = $_POST['roomname'];
		$location = $_POST['location'];
		$capacity = $_POST['capacity'];
		$projector = $_POST['projector'];
		$microphone = $_POST['microphone'];
		$other = $_POST['other'];


		mysqli_query($conn, "INSERT INTO room (roomname, location, capacity, projector, microphone, other) 
						VALUES ('$roomname', '$location', '$capacity', '$projector', '$microphone', '$other')");

		header('location:addroom.php');
	}
} else {
	echo '<script>alert("ERROR") </script> ';
	echo "<script>window.open('addroom.php','_self')</script>";
}
