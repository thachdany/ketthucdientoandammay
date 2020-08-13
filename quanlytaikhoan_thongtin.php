<?php
  //Kiem tra dang nhap hay chua
  session_start();
  $tenuser="";
  $quyen=0;
  //Biến lưu thông tin
  $HoTenLot="";
  $Ten="";
  $Email="";
  $SoDienThoai="";
  $DC_Ap="";
  $Tenhuyen="";

  if(isset($_SESSION["tenuser"]) && isset($_SESSION["quyen"])&& isset($_SESSION["mataikhoan"])){
    $tenuser=$_SESSION["tenuser"];
    $quyen=$_SESSION["quyen"];
    $mataikhoan=$_SESSION["mataikhoan"];
    //Ket noi CSDL
    include_once('csdl/connect.php');
    //Đọc dữ liệu từ CSDL
    $sql="SELECT tk.MaTaiKhoan, tk.HoTenLot, tk.Ten, tk.Email, tk.SoDienThoai, tk.DC_Ap, vc.Tenhuyen
    FROM taikhoan tk, vanchuyen_huyen vc
    WHERE tk.DC_MaHuyen=vc.Mahuyen and MaTaiKhoan='$mataikhoan'";
    $result=$conn->query($sql);
    //Kiểm tra tồn tại
    if($result->num_rows>0){
      $row = $result->fetch_assoc();
      //Họ và tên lót
      $HoTenLot=$row['HoTenLot'];
      $Ten=$row['Ten'];
      $Email=$row['Email'];
      $SoDienThoai=$row['SoDienThoai'];
      $DC_Ap=$row['DC_Ap'];
      $Tenhuyen=$row['Tenhuyen'];
    }
    //Ngắt kết nối
    $conn->close();
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
  </style>
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
      <button type="button" class="btn btn-primary" onclick="window.open('index.php','_self');">
        <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý tài khoản &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Thông tin tài khoản</button></div>
    <!--Bảng-->
    <div class="row" style="margin-top: 10px;" >
      <!--Menu danh sách-->
      <div class="col-3">
        <?php
          //Nạp từ file công cụ
          include_once('taikhoan_danhsachquanly.php');
        ?>
      </div>
      <div class="col-9 row">
        <!--Định dạng in đậm-->
        <style type="text/css">
          .indam{
            font-weight: bold;
            margin-right: 10px;
          }
          .dong{
            margin-bottom: 10px;
          }
        </style>
        <!--Thông tin tài khoản-->
        <div class="col-6">
          <div class="card">
            <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">   
              <div class="form-inline">
                <img src="img/dangky_chitiettaikhoan.png" width="35px">
                <h5 style="margin-left: 10px; font-weight: bold;">Thông tin tài khoản</h5>
              </div>
            </div>
            <div class="card-body">
              <!--Chia gird hiện thị bảng-->
              <!---->
              <form class="form-inline dong">
                <label class="indam">Họ và tên lót:</label>
                <label><?php echo $HoTenLot; ?></label>
              </form>
              <!---->
              <form class="form-inline dong">
                <label class="indam">Tên:</label>
                <label><?php echo $Ten; ?></label>
              </form>
              <!---->
              <form class="form-inline dong">
                <label class="indam">Email:</label>
                <label><?php echo $Email; ?></label>
              </form>
              <!---->
              <form class="form-inline dong">
                <label class="indam">Số điện thoại:</label>
                <label><?php echo $SoDienThoai; ?></label>
              </form>
            </div>
          </div>
        </div>     
        <!--Thông tin địa chỉ-->
        <div class="col-6">
          <div class="card">
            <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;"> 
              <div class="form-inline">
                <img src="img/dangky_diachi.png" width="35px">
                <h5 style="margin-left: 10px; font-weight: bold;">Địa chỉ liên hệ</h5>
              </div>
            </div>
            <div class="card-body">
              <!--Chia gird hiện thị bảng-->
              <!---->
              <form class="form-inline dong">
                <label class="indam">Địa chỉ huyện (thành phố):</label>
                <label><?php echo $Tenhuyen; ?></label>
              </form>
              <!---->
              <div>
                <label class="indam">Địa chỉ ấp (khóm) và xã (phường):</label>  
              </div>
              <div>
                <label><?php echo $DC_Ap; ?></label>
              </div>             
              <!---->
            </div>
          </div>
        </div>   
        <!---->
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