<?php
  $tenuser="";
  $quyen=0;
  if(isset($_SESSION["tenuser"]) && isset($_SESSION["quyen"])){
    $tenuser=$_SESSION["tenuser"];
    $quyen=$_SESSION["quyen"];
  }
  //Kết nối CSDL
  //include_once('../csdl/connect.php');
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
    //Xác nhận đăng ký
    function dangky_xacnhan(){
      var xacnhan=frmDangky.customCheck.checked;
      if(xacnhan==true){
        frmDangky.btn_dangky.disabled=false;
      }else{
        frmDangky.btn_dangky.disabled=true;
      }
    }
    //Kiểm tra thông tin
    function kiemtra(){
      //Kiểm tra mật khẩu có giống nhau không
      var matkhau_1=frmDangky.txtMatKhau.value;
      var matkhau_2=frmDangky.txtMatKhau_2.value;
      //Kiểm tra họ tên
      if(frmDangky.txtHotenlot.value==""){
        alert("Họ và tên lót không được để trống!");
        return false;
      }else if(frmDangky.txtTen.value==""){
        alert("Tên không được để trống!");
        return false;
      }else if(frmDangky.txtEmail.value==""){
        alert("Email không được để trống!");
        return false;
      }else if(frmDangky.txtSoDienThoai.value==""){
        alert("Số điện thoại không được để trống!");
        return false;
      }else if(frmDangky.txtMatKhau.value==""){
        alert("Mật khẩu không được để trống!");
        return false;
      }else if(frmDangky.txtMatKhau_2.value==""){
        alert("Chưa xác nhận mật khẩu!");
        return false;
      }else if(frmDangky.txtDC_2.value==""){
        alert("Vui lòng địa chỉ ấp (khóm), xã (phường)!");
        return false;
      }else if(matkhau_1!=matkhau_2){
        alert("Nhập lại mật khấu!");
        frmDangky.txtMatKhau.value="";
        frmDangky.txtMatKhau_2.value="";
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
      label.dangnhap_lb{
        font-weight: bold;
      }
    </style>
    <!--Hiện thị đường dẫn-->
    <div class="btn-group" style="margin-top: 10px;">
      <button type="button" class="btn btn-primary" onclick="window.open('index.php','_self');">
        <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary"
       onclick="window.open('user_dangnhap.php','_self')">Tài khoản &#10095;</button>
      <button type="button" class="btn btn-outline-primary" onclick="location.reload();">Đăng ký</button>
    </div>
    <!--Form đăng ký-->
    <div class="row" style="margin-top: 10px;">
      <!--Chi tiết tài khoản-->
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <div class="card">
            <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">
              <div class="form-inline">
                <img src="img/dangky_chitiettaikhoan.png" width="35px">
                <h5 style="margin-left: 10px;">Đăng ký tài khoản</h5>
              </div>
            </div>
            <div class="card-body">
              <!---->
              <div class="form-group">
                <label class="dangnhap_lb">Xin chào!</label>
                <label>Tài khoản của bạn đã được tạo trên hệ thống. Vui lòng đăng nhập để tiếp tục mua sắm!</label>
                <button type="btn" class="btn btn-danger" style="margin-top: 20px;" onclick="window.open('user_dangnhap.php','_self');">Đăng nhập ngay</button>
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