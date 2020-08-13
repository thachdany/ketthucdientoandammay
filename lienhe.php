<?php
  //Kiem tra dang nhap hay chua
  session_start();
  $tenuser="";
  $quyen=0;
  if(isset($_SESSION["tenuser"]) && isset($_SESSION["quyen"])){
    $tenuser=$_SESSION["tenuser"];
    $quyen=$_SESSION["quyen"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fuild">
  <!--Header_Nho-->
  <?php
    include_once('header_nho.php');
  ?>
  <!--Header_Lon-->
  <?php
    include_once('header_lon.php');
  ?>
  <!--NavBar-->
  <?php
    include_once('navbar.php');
  ?>
  <!--Dang ky va dang nhap-->
  <div class="row" style="padding-left: 20px; padding-right: 20px;">
    <div class="col-1"></div>
    <div class="col-10" style="margin-left: 20px; margin-right: 20px;">
      <!--Bat Dau-->
      <div>
        <style type="text/css">
        .btn_parent{
          background-color: #099a97;
          border-color: #099a97;
          color: white;
        }
        .btn_child{
          background-color: white;
          border-color: #099a97;
          color: #099a97;
        }
        </style>
        <div class="btn-group" style="margin-top: 10px;">
          <button type="button" class="btn btn_parent" onclick="window.open('index.php','_self');">
            <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
          <button type="button" class="btn btn_child"
            onclick="location.reload();">Liên Hệ</button>
        </div>
      </div>
      <h4 style="margin-top: 20px; margin-bottom: 10px;">Thông tin liên hệ</h4>
      <p>Mọi thắc mắc hoặc yêu cầu tư vấn thêm xin liên hệ:</p>
      <p><b>Số điện thoại:</b> 083641131.</p>
      <p><b>Hộp thư Email:</b> thachdanyjin@gmail.com.</p>
      <p>Hoặc đến trực tiếp cửa hàng:</p>
      <p>Cửa hàng: <b>Hoa Tươi Trà Vinh</b></p>
      <p><b>Địa chỉ:</b> 100 Nguyễn Đáng, Khóm 3, Phường 6, Thành phố Trà Vinh, Trà Vinh</p>
      <!--Het-->
    </div>
    <div class="col-1"></div>
  </div> 
  <!--Footer-->
  <?php
    include_once('footer.php');
  ?>
</div>

</body>
</html>