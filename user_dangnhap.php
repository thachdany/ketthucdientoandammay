<?php
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
  <style type="text/css">
      nav {
        background: #DC136C;
        padding-top: 0px;
      }
      li a {
        color: white;
        text-decoration: none;
        width: 100px;
        text-align: center;  
        font-weight: bold;      
      }
      /* Change the link color on hover */
      li a:hover {
        background-color: #FFB7B7;
        color: white;
      }
      /* Canh giữa dòng: vận chuyển,...; */
      div.div_khunggiua{
        justify-content: center;
        display: flex;
      }

  </style>
  <script type="text/javascript">
    function kiemtra_dangnhap(){
      //Kiểm tra trống
      if(frmDangNhap.txtEmail.value==""){
        alert("Chưa nhập địa chỉ email!");
        return false;
      }else if(frmDangNhap.txtMatkhau.value==""){
        alert("Chưa nhập mật khẩu!");
        return false;
      }
      return true;
    }
  </script>
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

<div style="margin-left: 20px; margin-right: 20px;">
  <!--Dang ky va dang nhap-->
  <style type="text/css">
    button.dangnhap_btn_dangnhap{
      padding-left: 20px;
      padding-right: 20px;
      font-size: 17px;
    }
  </style>
  <!--Hiện thị đường dẫn-->
  <div class="btn-group" style="margin-top: 10px;">
    <button type="button" class="btn btn-primary" onclick="window.open('index.php','_self');">
      <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
    <button type="button" class="btn btn-primary" onclick="location.reload();">Tài khoản &#10095;</button>
    <button type="button" class="btn btn-outline-primary" onclick="location.reload();">Đăng nhập</button></div>
  <div class="row" style="margin-top: 10px;">
    <!--Dang ky-->
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header" style="background-color: green;font-size:20px; border: #F5CFCF; color: white;">
            <center>Khách hàng mới</center>
          </div>
          <div class="card-body">
            <p style="font-weight: bold; margin-bottom: 20px;">Đăng ký</p>
            <p style="margin-bottom: 20px;">Việc tạo tài khoản giúp  bạn có thể mua sắm nhanh hơn, theo dõi trạng thái đơn hàng và theo dõi đơn hàng mà bạn đã đặt.</p>
            <button type="button" class="btn btn-danger dangnhap_btn_dangnhap" onclick="window.open('user_dangky.php','_self');">Tiếp tục</button>
          </div>
        </div></div>
    <!--Dang nhap-->
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header" style="background-color: green; font-size:20px; border: #F5CFCF; color: white;">
            <center>Khách hàng cũ</center>
          </div>
          <div class="card-body">
            <p style="font-weight: bold; margin-bottom: 20px;">Tôi là khách hàng cũ</p>        
            <form name="frmDangNhap" method="post" onsubmit="return kiemtra_dangnhap();">
              <!--Thông báo đăng nhập sai-->
              <div class="alert alert-danger" id="divdangnhap" style="display: none;">
                <strong>Lỗi!</strong> Địa chỉ email hoặc mật khẩu sai, vui lòng nhập lại!
              </div>
              
              <div class="form-group">
                <label>Địa chỉ Email:</label>
                <input type="text" name="txtEmail" class="form-control" placeholder="Nhập địa chỉ email">
              </div>
              <div class="form-group">
                <label>Mật khẩu:</label>
                <input type="password" name="txtMatkhau" class="form-control" placeholder="Nhập mật khẩu">
              </div>
              <button type="submit" class="btn btn-danger dangnhap_btn_dangnhap">Đăng nhập</button>
              <!--Kiểm tra đăng nhập-->
              <?php
                if(isset($_POST["txtEmail"])&&isset($_POST["txtMatkhau"])){
                  $txtEmail=$_POST["txtEmail"];
                  $txtMatkhau=md5($_POST["txtMatkhau"]);
                  //Kết nối CSDL
                  include_once("csdl/connect.php");
                  $sql="SELECT Ten, Quyen, MaTaiKhoan FROM taikhoan WHERE Email='$txtEmail' and MatKhau='$txtMatkhau'";
                  $result=$conn->query($sql);
                  //Kết quả
                   if($result->num_rows>0){
                    //Đúng
                    $row = $result->fetch_assoc();
                    //Lưu Session                    
                    $_SESSION["tenuser"] = $row['Ten'];
                    $_SESSION["quyen"] = $row['Quyen'];
                    $_SESSION["mataikhoan"] = $row['MaTaiKhoan'];
                    //Về trang chủ
                    echo "<script>window.open('index.php','_self');</script>";
                  }else{
                    //Sai
                    echo "<script>";
                    //Hiện thông báo
                    echo "document.getElementById('divdangnhap').style.display = 'block';";
                    //Trả Email
                    echo "frmDangNhap.txtEmail.value='".$txtEmail."';";
                    echo "</script>";
                  }
                  $conn->close();
                }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Footer-->
  <?php
    include_once('footer.php');
  ?>
</div>
</body>
</html>
      