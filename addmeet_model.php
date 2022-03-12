<?php
	include('conn.php');
	
	$title=$_POST['title'];
	$head=$_POST['head'];
	$numattend=$_POST['numattend'];
	$listname=$_POST['listname'];
	$roomid=$_POST['roomid'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$addequipment=$_POST['addequipment'];
	$remark=$_POST['remark'];
	// $meetfile=$_POST['meetfile'];
	$useract = $_POST['useract'];  //value from input name=useract type=POST


	//code upload meetfile
	$file = $_FILES['meetfile'];
	$filename = $_FILES['meetfile']['name'];
	$fileTempname = $_FILES['meetfile']['tmp_name'];
	$fileExt = explode(".",$filename);
	$fileAcExt = strtolower(end($fileExt));
	$newFilename = time() . "." . $fileAcExt;
	$fileDes = 'meet_upload/' . $newFilename;

	move_uploaded_file($fileTempname,$fileDes);
	$meetfilelocation = $fileDes;
	//code upload meetfile
	
	mysqli_query($conn,"INSERT INTO meeting (title, head, numattend, listname, roomid, start, end, addequipment, remark, meetfile, userid) 
						VALUES ('$title', '$head', '$numattend', '$listname', '$roomid', '$start', '$end', '$addequipment', '$remark', '$meetfilelocation', '$useract' )");
	header('location:addmeet.php');

?>
