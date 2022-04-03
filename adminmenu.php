<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Just an image -->

        <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="30" height="30" alt="">
        </a>

        <a class="navbar-brand" href="./adminpage.php">ระบบจองห้องประชุม</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">


                <!-- <li class="nav-item ">
                    <a class="nav-link" href="calendar.php">
                        ปฎิทินการจองห้องประชุม
                    </a>
                </li> -->

                <li class="nav-item ">
                    <a class="nav-link" href="addroom.php">
                        เพิ่มห้องประชุม
                    </a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="addmeet.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        จองห้องประชุม
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="calendar.php">ค้นหาห้องประชุม</a>
                        <a class="dropdown-item" href="addmeet.php">จองห้องประชุม</a>
                    </div>
                </li>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        รายการจองห้องประชุม
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">ตรวจสอบสถานะการจอง</a>
                    </div>
                </li> -->

            </ul>

            <div class="ml-md-2 my-lg-0">

                <?php

                session_start();
                //check session 
                if (isset($_SESSION['user'])) {
                    echo "<p style='color:white'>ยินดีต้อนรับ ";
                    echo $_SESSION['user'];
                    // echo "<span>  ID : ";
                    // echo $_SESSION['ID'];
                    // echo "</span>";
                    echo "</p>";
                } else {
                    echo "<script>alert('คุณยังไม่ได้เข้าสู่ระบบ กลับไปยังหน้าเข้าสู่ระบบก่อน')</script>";
                    echo "<script>window.open('login.php','_self')</script>";
                }
                ?>

                <a href="logout.php" class="btn btn-primary" role="button">ออกจากระบบ</a>
            </div>

        </div>
    </div>
</nav>