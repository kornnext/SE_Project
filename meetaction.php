<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['meetid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Delete</h4>
                </center>
            </div>
            <div class="modal-body">
                <?php
                $del = mysqli_query($conn, "SELECT * FROM meeting WHERE meetid='" . $row['meetid'] . "'");
                $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h6>
                        <center>รหัสการจอง: <strong><?php echo $drow['meetid']; ?></strong></center>
                    </h6>
                    <h5>
                        <center>วาระการประชุม: <strong><?php echo $drow['title']; ?></strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="deletemeet.php?meetid=<?php echo $row['meetid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            </div>

        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['meetid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                </center>
            </div>
            <div class="modal-body">
                <?php
                $edit = mysqli_query($conn, "SELECT * FROM meeting WHERE meetid='" . $row['meetid'] . "'");
                $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">

                    <form method="POST" action="editmeet.php?meetid=<?php echo $erow['meetid']; ?>">
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">รหัสการจอง:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="meetid" class="form-control" value="<?php echo $erow['meetid']; ?>" disabled>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">วาระการประชุม:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="title" class="form-control" value="<?php echo $erow['title']; ?>">
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">จำนวนผู้เข้าประชุม:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="number" min="0" name="numattend" class="form-control" value="<?php echo $erow['numattend']; ?>">
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">อุปกรณ์เพิ่มติม:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="addequipment" class="form-control" value="<?php echo $erow['addequipment']; ?>">
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">หมายเหตุ:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="remark" class="form-control" value="<?php echo $erow['remark']; ?>">
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->