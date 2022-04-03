<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">ลบการจองห้องประชุม</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $del = mysqli_query($conn, "SELECT * FROM events WHERE id='" . $row['id'] . "'");
                $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <!-- <h6>
                        <center>รหัสการจอง: <strong><?php echo $drow['id']; ?></strong></center>
                    </h6> -->
                    <h5>
                        <center>วาระการประชุม: <strong><?php echo $drow['title']; ?></strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <a href="deletemeet.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
            </div>

        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลการจองห้องประชุม</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $edit = mysqli_query($conn, "SELECT * FROM events WHERE id='" . $row['id'] . "'");
                $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">

                    <form method="POST" action="editmeet.php?id=<?php echo $erow['id']; ?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">รหัสการจอง:</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" name="id" class="form-control" value="<?php echo $erow['id']; ?>" disabled>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">วาระการประชุม:</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" name="title" class="form-control" value="<?php echo $erow['title']; ?>">
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">จำนวนผู้เข้าประชุม:</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" min="0" name="numattend" class="form-control" value="<?php echo $erow['numattend']; ?>">
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">อุปกรณ์เพิ่มติม:</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" name="addequipment" class="form-control" value="<?php echo $erow['addequipment']; ?>">
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">หมายเหตุ:</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" name="remark" class="form-control" value="<?php echo $erow['remark']; ?>">
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->