<!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <title>ระบบจองห้องประชุม</title>


</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <!-- Just an image -->

      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" alt="">
      </a>

      <a class="navbar-brand" href="index.html">ระบบจองห้องประชุม</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">


          <li class="nav-item ">
            <a class="nav-link" href="#">
              ปฎิทินการจองห้องประชุม
            </a>
          </li>



          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              จองห้องประชุม
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">ค้นหาห้องประชุม</a>
              <a class="dropdown-item" href="#">จองห้องประชุม</a>
              <a class="dropdown-item" href="#">แก้ไขข้อมูลห้องประชุม</a>
            </div>

          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              รายการจองห้องประชุม
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">ตรวจสอบสถานะการจอง</a>
            </div>
          </li>

        </ul>

        <div class="ml-md-2 my-lg-0">

          <?php
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


  <div>
    <img src="img/meeting.png" class="center-block img-fluid" alt="Responsive image">
  </div>









  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>