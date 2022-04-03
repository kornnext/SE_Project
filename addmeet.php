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
	<?php include("adminmenu.php"); ?>

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
					<th >รหัส</th>
					<th>วาระประชุม</th>
					<th>ประธานการประชุม</th>
					<th>จำนวนผู้เข้าประชุม</th>
					<th>ห้องประชุม</th>
					<th>วันเวลาเริ่มประชุม</th>
					<th>วันเวลาสิ้นสุดการประชุม</th>
					<th>เอกสารแนบ</th>
					<th style="width: 10.00rem;">
						<a href="#addnew" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>จองห้องประชุม</a>
					</th>
				</thead>
				<tbody>
					<?php
					include('conn.php');

					$query = mysqli_query($conn, "SELECT * FROM meeting.events");
					while ($row = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['head']; ?></td>
							<td><?php echo $row['numattend']; ?></td>
							<td><?php echo $row['roomid']; ?></td>
							<td><?php echo $row['start']; ?></td>
							<td><?php echo $row['end']; ?></td>
							<td><a href="<?php echo $row['meetfile']; ?>"><div class="btn btn-primary">ดูไฟล์</div></a></td>
							<td>
								<a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>แก้ไข</a> ||
								<a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
								<?php include('meetaction.php'); ?>
							</td>
						</tr>
					<?php
					}

					?>
				</tbody>
			</table>
		</div>
		<?php include('addmeet_view.php'); ?>

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