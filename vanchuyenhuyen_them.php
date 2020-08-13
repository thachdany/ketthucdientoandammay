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
  <!--Trang giữa-->
  <div style="margin-left: 20px; margin-right: 20px;">
    <!--Hiện thị đường dẫn-->
    <div class="btn-group" style="margin-top: 10px;">
      <button type="button" class="btn btn-primary">
        <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý cửa hàng &#10095;</button>
      <button type="button" class="btn btn-primary"
        onclick="window.open('vanchuyenhuyen_danhsach.php','_self');">Vận chuyển-Huyện, TP &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Thêm mới</button>
    </div>
    <!--Bảng-->
    <div class="row" style="margin-top: 10px;">
      <!--Menu danh sách-->
      <div class="col-sm-3">
        <?php
          //Nạp từ file công cụ
          include_once('admin_danhmucquanly.php');
        ?>
      </div>
      <div class="col-sm-9">
        <div class="card">
          <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">       
            <h4 style="font-weight: bold;">Thêm Huyện, Thành phố</h4>
          </div>
          <div class="card-body row">
            <div class="col-4"></div>
            <div class="col-4">
              <form action="xuly_vanchuyenhuyen.php?tacvu=them" method="post">
              <!--Nhập tên huyện-->
              <div class="form-group">
                <label style="font-weight: bold;">Tên huyện, thành phố:</label>
                <input type="text" class="form-control" placeholder="Nhập tên huyện, thành phố" name="txtTenhuyen">
              </div>
              <!--Nhập phí vận chuyện-->
              <div class="form-group">
                <label style="font-weight: bold;">Phí vận chuyển:</label>
                <input type="text" class="form-control" placeholder="Nhập phí vận chuyển" name="txtPhivanchuyen">
              </div>
              <!--Button-->
              <div align="center">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <button type="reset" class="btn btn-secondary">Hủy</button>
              </div>       
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Footer-->
  <?php
    include_once('footer.php');
  ?>
  <!---->
</div>
</body>
</html>