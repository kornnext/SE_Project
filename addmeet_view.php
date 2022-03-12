<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">จองการประชุม</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="addmeet_model.php" enctype="multipart/form-data">
						<!-- add : enctype="multipart/form-data" -->
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">วาระประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="title" required>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ประธานการประชุม:</label>
							</div>
							<div class="col-lg-8">
								<select class="form-control text-center" id="head" name="head" required>
									<option selected disabled> --เลือกประธาน-- </option>
									<option value="รองนายกเทศมนตรี1">รองนายกเทศมนตรี1</option>
									<option value="รองนายกเทศมนตรี2">รองนายกเทศมนตรี2</option>
									<option value="รองนายกเทศมนตรี3">รองนายกเทศมนตรี3</option>
								</select>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">จำนวนผู้เข้าประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="numattend" required>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ผู้เข้าร่วมประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="listname" required>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ห้องประชุม:</label>
							</div>
							<div class="col-lg-8">
								<select class="form-control text-center" id="roomid" name="roomid" required>
									<?php
									include('conn.php');
									$query = mysqli_query($conn, "SELECT * FROM room ORDER BY roomname ASC");
									while ($row = mysqli_fetch_array($query)) {
									?>
										<option value="<?php echo $row['roomid']; ?>"><?php echo $row['roomname']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">เริ่มเวลา:</label>
							</div>
							<div class="col-lg-8">
								<input type="datetime-local" class="form-control text-center" name="start" required>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">สิ้นสุดเวลา:</label>
							</div>
							<div class="col-lg-8">
								<input type="datetime-local" class="form-control text-center" name="end" required>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">อุปกรณ์เพิ่มเติม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="addequipment" required>
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">หมายเหตุ:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="remark" required>
							</div>
						</div>

						<!-- <div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">เอกสารวาระประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="meetfile">
							</div>
						</div> -->

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">แนบเอกสารวาระประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input class="form-control" type="file" id="formFile" name="meetfile" required>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ผู้จองประชุม:</label>
							</div>
							<div class="col-lg-8">
								<?php
								include('conn.php');
								$userrequest = $_SESSION['user'];
								$queryuser = mysqli_query($conn, "SELECT * FROM user WHERE username='$userrequest'");
								while ($row = mysqli_fetch_array($queryuser)) {
								?>
									<div class=" text-center">
										<?php echo $row['username']; ?>
										<!-- <span>ID : </span> -->
										<?php //echo $_SESSION['ID']; 
										?>
									<?php } ?>
									</div>
							</div>
						</div>

						<!-- input sent value to next page -->
						<input type="number" hidden value="<?php echo $_SESSION['ID']; ?>" name="useract">
						<!-- input sent value to next page -->

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
					</form>
			</div>

		</div>
	</div>
</div>