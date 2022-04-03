<?php
include('conn.php');

if (isset($_POST['submit'])) {
    // echo 'send data success' . '<br>';


    if ($_POST['end'] < $_POST['start']) {

        echo "<script>alert('ไม่สามารถทำได้ เวลาสิ้นสุดต้องมากกว่าเวลาเริ่มต้น!!')</script>";
        echo "<script>window.open('user_meeting.php','_self')</script>";
    } elseif ($_POST['end'] > $_POST['start']) {

        // ตรวจสอบความจุห้อง

        $sql = "SELECT * FROM room
				WHERE room.roomid = '" . $_POST['roomid'] . "'
				AND room.capacity >=  '" . $_POST['numattend'] . "' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // echo '<script>alert("สามารถจองได้เพราะคนไม่เกิน") </script> ';

            $ac_room = 1;
        } else {
            // echo '<script>alert("ไม่สามารถจองได้ เพราะจำนวนผู้เข้าร่วมประชุม เกินความจุของประเภทห้องที่เลือก กรุณาเลือกใหม่อีกครั้ง") </script> ';
            $ac_room = 0;
        }

        // ตรวจสอบความจุห้อง



        // ตรวจสอบว่าห้องว่างหรือไม่ ณ เวลาที่เลือก


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
            //echo "<script>alert('จองไม่ได้ เพราะเวลานี้มีการจองห้องนี้ไปแล้ว!!!!')</script>";

            $ac_dateSnE = 0;
        } else {
            // echo "<script>alert('จองได้')</script>";
            $ac_dateSnE = 1;
        }

        // ตรวจสอบว่าห้องว่างหรือไม่ ณ เวลาที่เลือก




        // ตรวจสอบว่าประธานว่างหรือไม่ ณ เวลาที่เลือก

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
            //echo "<script>alert('ประธานคนนี้ติดประชุมแล้ว ไม่สามารถเลือกได้!!!!!')</script>";

            $ac_head = 0;
        } else {
            // echo "<script>alert('เลือกประธานได้')</script>";
            $ac_head = 1;
        }

        // ตรวจสอบว่าประธานว่างหรือไม่ ณ เวลาที่เลือก


        if ($ac_room == 1 && $ac_dateSnE == 1 && $ac_head == 1) {
            // echo 'ทั้งหมดผ่านเงื่อนไข สามารถจองได้';

            $title = $_POST['title'];
            $head = $_POST['head'];
            $numattend = $_POST['numattend'];
            $listname = $_POST['listname'];
            $roomid = $_POST['roomid'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $addequipment = $_POST['addequipment'];
            $remark = $_POST['remark'];
            $useract = $_POST['useract'];  //value from input name=useract type=POST


            //code upload meetfile
            $file = $_FILES['meetfile'];
            $filename = $_FILES['meetfile']['name'];
            $fileTempname = $_FILES['meetfile']['tmp_name'];
            $fileExt = explode(".", $filename);
            $fileAcExt = strtolower(end($fileExt));
            $newFilename = time() . "." . $fileAcExt;
            $fileDes = 'meet_upload/' . $newFilename;

            move_uploaded_file($fileTempname, $fileDes);
            $meetfilelocation = $fileDes;
            //code upload meetfile

            mysqli_query($conn, "INSERT INTO events (title, head, numattend, listname, roomid, start, end, addequipment, remark, meetfile, userid) 
						VALUES ('$title', '$head', '$numattend', '$listname', '$roomid', '$start', '$end', '$addequipment', '$remark', '$meetfilelocation', '$useract' )");
            echo "<script>window.open('user_meeting.php','_self')</script>";
        } elseif ($ac_room < 1 || $ac_dateSnE < 1 || $ac_head < 1) {
            echo "<script>alert('ไม่สามารถจองห้องประชุมได้!  โปรดตรวจสอบว่าห้องที่ท่านเลือก ณ เวลานั้นว่าง และประธานประชุมติดการประชุมอื่นอยู่หรือไม่  ลองอีกครั้งภายหลัง ขออภัยในความไม่สะดวก')</script>";
            // echo 'false 1';
            echo "<script>window.open('user_meeting.php','_self')</script>";
        }
    } elseif ($_POST['end'] >= $_POST['start']) {
        echo "<script>alert('ไม่สามารถทำได้ เวลาสิ้นสุดต้องมากกว่าเวลาเริ่มต้น!!!!')</script>";
        echo "<script>window.open('user_meeting.php','_self')</script>";
    }
} else {
    echo "<script>alert('ERROR')</script>";
    echo "<script>window.open('user_meeting.php','_self')</script>";
}
