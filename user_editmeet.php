<?php
include('conn.php');

if (isset($_POST['submit'])) {
	$sql = "SELECT * FROM room
		WHERE room.roomid = '" . $_POST['roomid'] . "'
		AND room.capacity >=  '" . $_POST['numattend'] . "' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// echo '<script>alert("สามารถจองได้เพราะคนไม่เกิน") </script> ';
		// echo "<script>window.open('addroom.php','_self')</script>";
		// $ac_room = 1;
		$id = $_GET['id'];

		$title = $_POST['title'];
		$numattend = $_POST['numattend'];
		$addequipment = $_POST['addequipment'];
		$remark = $_POST['remark'];


		mysqli_query($conn, "UPDATE events 
								SET title='$title', numattend='$numattend', addequipment='$addequipment', remark='$remark' 
								WHERE id='$id'");
		header('location:user_meeting.php');
	} else {
		echo '<script>alert("ไม่สามารถจองได้ เพราะจำนวนผู้เข้าร่วมประชุม เกินความจุของประเภทห้องที่เลือก กรุณากรอกใหม่อีกครั้ง") </script> ';
		echo "<script>window.open('user_meeting.php','_self')</script>";
	}
}
