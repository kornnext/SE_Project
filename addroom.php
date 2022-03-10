<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>ระบบจองห้องประชุม</title>

</head>

<body>
	<?php include("adminmenu.php"); ?>

	<div>
		<img src="img/meeting.png" class="center-block img-fluid" alt="Responsive image">
	</div>

	<div class="container">
		<div style="height:50px;"></div>
		<div class="well" style="margin:auto; padding:auto; width:80%;">
			<span style="font-size:25px; color:blue">
				<center><strong>เพิ่มห้องประชุม</strong></center>
			</span>
			<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
			<div style="height:50px;"></div>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>ชื่อห้องประชุม</th>
					<th>สถานที่</th>
					<th>ความจุห้อง</th>
					<th>มีโปรเจคเตอร์</th>
					<th>มีไมค์</th>
					<th>อื่นๆ</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php
					include('conn.php');

					$query = mysqli_query($conn, "select * from room");
					while ($row = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo $row['roomname']; ?></td>
							<td><?php echo $row['location']; ?></td>
							<td><?php echo $row['capacity']; ?></td>
							<td><?php echo $row['projector']; ?></td>
							<td><?php echo $row['microphone']; ?></td>
							<td><?php echo $row['other']; ?></td>
							<td>
								<a href="#edit<?php echo $row['roomid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
								<a href="#del<?php echo $row['roomid']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('roomaction.php'); ?>
							</td>
						</tr>
					<?php
					}

					?>
				</tbody>
			</table>
		</div>
		<?php include('addroom_view.php'); ?>
	</div>







	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>