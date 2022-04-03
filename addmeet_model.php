<?php
include('conn.php');

if (isset($_POST['submit'])) {
	echo 'send data success';



	$sql_chkDateTime = "SELECT * FROM events WHERE events.roomid = '" . $_POST['roomid'] . "'
	AND (
	   (events.start BETWEEN '" . $_POST['start'] . "' AND '" . $_POST['end'] . "' )
	   OR 
	   (events.end BETWEEN '" . $_POST['start'] . "' AND '" . $_POST['end'] . "' )
	   OR 
		('" . $_POST['start'] . "' BETWEEN events.start  AND events.end)
	   OR 
		('" . $_POST['end'] . "' BETWEEN  events.start  AND events.end )
	)
	";

	$result_chkDateTime = $conn->query($sql_chkDateTime);

	if ($result_chkDateTime->num_rows > 0) {
		echo "<script>alert('จองไม่ได้ เพราะเวลานี้มีการจองห้องนี้ไปแล้ว!!!!')</script>";
		// echo "<script>window.open('login.php','_self')</script>";
	} else {
		echo "<script>alert('จองได้')</script>";
	}


	$sql_chkHead = " SELECT * FROM events WHERE events.head = '" . $_POST['head'] . "'
	AND (
	
	   (events.start BETWEEN '" . $_POST['start'] . "' AND '" . $_POST['end'] . "' )
	   OR 
	   (events.end BETWEEN '" . $_POST['start'] . "' AND '" . $_POST['end'] . "' )
	   OR 
		('" . $_POST['start'] . "' BETWEEN events.start  AND events.end)
	   OR 
		('" . $_POST['end'] . "' BETWEEN  events.start  AND events.end )
	) ";

	$result_chkHead = $conn->query($sql_chkHead);

	if ($result_chkHead->num_rows > 0) {
		echo "<script>alert('ประธานคนนี้ติดประชุมแล้ว ไม่สามารถเลือกได้!!!!!')</script>";
		// echo "<script>window.open('login.php','_self')</script>";
	} else {
		echo "<script>alert('เลือกประธานได้')</script>";
	}
} else {
	echo 'ERROR';
}




// SELECT * FROM events WHERE events.roomID = 6
// AND (

//    (events.start BETWEEN 20220318120200 AND 20220318140200 )
//    OR 
//    (events.end BETWEEN 20220318120200 AND 20220318140200 )
//    OR 
//     (20220318120200 BETWEEN events.start  AND events.end)
//    OR 
//     (20220318140200 BETWEEN  events.start  AND events.end )
// )








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
