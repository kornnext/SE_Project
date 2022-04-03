<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['roomid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">ลบห้องประชุม</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $del = mysqli_query($conn, "SELECT * FROM room WHERE roomid='" . $row['roomid'] . "'");
                $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5>
                        <center>ชื่อห้องประชุม: <strong><?php echo $drow['roomname']; ?></strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <a href="deleteroom.php?roomid=<?php echo $row['roomid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
            </div>

        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['roomid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลห้อง</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $edit = mysqli_query($conn, "SELECT * FROM room WHERE roomid='" . $row['roomid'] . "'");
                $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" action="editroom.php?roomid=<?php echo $erow['roomid']; ?>">
                        <div class="row">
                            <div class="col-lg-5">
                                <label style="position:relative; top:7px;">ชื่อห้อง:</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" name="roomname" class="form-control" value="<?php echo $erow['roomname']; ?>" >
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label style="position:relative; top:7px;">สถานที่:</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" name="location" class="form-control" value="<?php echo $erow['location']; ?>" >
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label style="position:relative; top:7px;">ความจุห้อง:</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="number" name="capacity" class="form-control" value="<?php echo $erow['capacity']; ?>" >
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label style="position:relative; top:7px;">จำนวนโปรเจคเตอร์:</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="number" name="projector" class="form-control" value="<?php echo $erow['projector']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label style="position:relative; top:7px;">จำนวนไมค์โครโฟน:</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="number" name="microphone" class="form-control" value="<?php echo $erow['microphone']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label style="position:relative; top:7px;">อื่นๆ:</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" name="other" class="form-control" value="<?php echo $erow['other']; ?>">
                            </div>
                        </div>
                        

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>ยกเลิก</button>
                <button type="submit" class="btn btn-success" name="submit_edit"><span class="glyphicon glyphicon-check"></span>บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->