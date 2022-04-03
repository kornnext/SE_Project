<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />

    <title>ระบบจองห้องประชุม</title>

</head>

<body>
    <?php session_start();
    include("./usermenu.php"); ?>

    <div>
        <?php include('./carousel.php') ?>

    </div>



    <div class="container">

        <div style="height:50px;"></div>
        <div class="well" style="margin:auto; padding:auto; width:100%;">
            <span style="font-size:25px; ">
                <center><strong>เพิ่มการประชุม</strong></center>
            </span>

            <div style="height:50px;"></div>

            <table class="table table-striped table-bordered table-hover text-center" id="addmeet">
                <thead>
                    <th>รหัส</th>
                    <th>วาระประชุม</th>
                    <th>ประธานการประชุม</th>
                    <th>จำนวนผู้เข้าประชุม</th>
                    <th style="width: 8.00rem;">ห้องประชุม</th>
                    <th>วันเวลาเริ่มประชุม</th>
                    <th>วันเวลาสิ้นสุดการประชุม</th>
                    <th>เอกสารแนบ</th>
                    <th style="width: 8.00rem;">
                        <a href="#addnew" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>จองห้องประชุม</a>
                    </th>
                </thead>
                <tbody>
                    <?php
                    include('conn.php');

                    // echo $_SESSION['ID'];

                    $sql_events = " SELECT * FROM events INNER JOIN user ON events.userid = user.ID   WHERE user.ID = '" . $_SESSION['ID'] . "' ";
                    $result_events = $conn->query($sql_events);



                    while ($row_events = $result_events->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row_events['id']; ?></td>
                            <td><?php echo $row_events['title']; ?></td>
                            <td><?php echo $row_events['head']; ?></td>
                            <td><?php echo $row_events['numattend']; ?></td>
                            <td>

                                <?php echo $row_events['roomid']; ?> ||
                                <?php
                                $sql_room = "SELECT * FROM room WHERE room.roomid = '" . $row_events['roomid'] . "' ";
                                $result_room = $conn->query($sql_room);
                                $row_room = $result_room->fetch_assoc();
                                ?>

                                <?php echo $row_room['roomname']; ?></td>

                            <td><?php echo $row_events['start']; ?></td>
                            <td><?php echo $row_events['end']; ?></td>
                            <td><a href="<?php echo $row_events['meetfile']; ?>">
                                    <div class="btn btn-primary">ดูไฟล์</div>
                                </a></td>
                            <td>
                                <a href="#edit<?php echo $row_events['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>แก้ไข</a>
                                <?php include('./user_meetaction.php'); ?>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <?php include('./user_addmeet_view.php'); ?>

    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/th.json"></script>


    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "emptyTable": "ไม่มีข้อมูลในตาราง",
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง_MENU_ แถว",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "เิริ่มต้น",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "สุดท้าย"
                }
            }
        });


        $(document).ready(function() {
            $('#addmeet').DataTable({
                ordering: false
            });
        });
    </script>



</body>

</html>