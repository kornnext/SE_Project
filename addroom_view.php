<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">เพิ่มห้องประชุม</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="addroom_model.php">
						<div class="row">
							<div class="col-lg-5">
								<label class="control-label" style="position:relative; top:7px;">ชื่อห้อง:</label>
							</div>
							<div class="col-lg-7">
								<input type="text" class="form-control" name="roomname" required placeholder="">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-5">
								<label class="control-label" style="position:relative; top:7px;">สถานที่:</label>
							</div>
							<div class="col-lg-7">
								<input type="text" class="form-control" name="location" required placeholder="">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-5">
								<label class="control-label" style="position:relative; top:7px;">ความจุห้อง:</label>
							</div>
							<div class="col-lg-7">
								<input type="number" class="form-control" name="capacity" min="0" required placeholder=" ">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-5">
								<label class="control-label" style="position:relative; top:7px;">จำนวนโปรเจคเตอร์:</label>
							</div>
							<div class="col-lg-7">
								<input type="number" class="form-control" name="projector" min="0" required placeholder=" ">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-5">
								<label class="control-label" style="position:relative; top:7px;">จำนวนไมค์โครโฟน:</label>
							</div>
							<div class="col-lg-7">
								<input type="number" class="form-control" name="microphone" min="0" required placeholder=" ">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-5">
								<label class="control-label" style="position:relative; top:7px;">อื่นๆ:</label>
							</div>
							<div class="col-lg-7">
								<input type="text" class="form-control" name="other" placeholder=" ">
							</div>
						</div>
						<div style="height:10px;"></div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
				<button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-floppy-disk"></span> เพิ่ม</a>
					</form>
			</div>

		</div>
	</div>
</div>