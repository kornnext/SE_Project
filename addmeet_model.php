<?php
	include('conn.php');

if(isset($_POST['submit'])){
	echo 'send data success';

	$sql = "SELECT * FROM room
	WHERE room.roomid = '".$_POST['roomid']."'
	AND room.capacity >=  '".$_POST['numattend']."' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo '<script>alert("สามารถจองได้เพราะคนไม่เกิน") </script> ';
		// echo "<script>window.open('addroom.php','_self')</script>";
	}else{
		echo '<script>alert("ไม่สามารถจองได้ เพราะจำนวนผู้เข้าร่วมประชุม เกินความจุของประเภทห้องที่เลือก กรุณาเลือกใหม่อีกครั้ง") </script> ';
	}


	$sql_chkDateTime = "SELECT * FROM events 
	WHERE roomid = '".$_POST['roomid']."'             				
	AND events.start BETWEEN '".$_POST['start']."' AND '".$_POST['end']."'
	AND events.end BETWEEN '".$_POST['start']."' AND '".$_POST['end']."' 
	
	";
	$result_chkDateTime = $conn->query($sql_chkDateTime);

	if ($result_chkDateTime->num_rows > 0) {
		echo '<script>alert("ไม่ได้ เพราะเวลาชนกัน") </script> ';
		// echo "<script>window.open('addroom.php','_self')</script>";
	}else{
		echo '<script>alert("สามารถจองได้") </script> ';
	}




}else{
	echo 'ERROR';

}
	
	// $title=$_POST['title'];
	// $head=$_POST['head'];
	// $numattend=$_POST['numattend'];
	// $listname=$_POST['listname'];
	// $roomid=$_POST['roomid'];
	// $start=$_POST['start'];
	// $end=$_POST['end'];
	// $addequipment=$_POST['addequipment'];
	// $remark=$_POST['remark'];
	// // $meetfile=$_POST['meetfile'];
	// $useract = $_POST['useract'];  //value from input name=useract type=POST


	// //code upload meetfile
	// $file = $_FILES['meetfile'];
	// $filename = $_FILES['meetfile']['name'];
	// $fileTempname = $_FILES['meetfile']['tmp_name'];
	// $fileExt = explode(".",$filename);
	// $fileAcExt = strtolower(end($fileExt));
	// $newFilename = time() . "." . $fileAcExt;
	// $fileDes = 'meet_upload/' . $newFilename;

	// move_uploaded_file($fileTempname,$fileDes);
	// $meetfilelocation = $fileDes;
	// //code upload meetfile
	
	// mysqli_query($conn,"INSERT INTO events (title, head, numattend, listname, roomid, start, end, addequipment, remark, meetfile, userid) 
	// 					VALUES ('$title', '$head', '$numattend', '$listname', '$roomid', '$start', '$end', '$addequipment', '$remark', '$meetfilelocation', '$useract' )");
	// header('location:addmeet.php');



// work
	// SELECT * FROM events 
	// WHERE roomid = 6             start				end
	// AND events.start BETWEEN 20220318110200 AND 20220318120200
	// OR events.end BETWEEN 20220318110200 AND 20220318120200; 
// work
?>
