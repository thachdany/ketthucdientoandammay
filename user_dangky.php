<?php
  //Kiem tra dang nhap hay chua
  session_start();
  $tenuser="";
  $quyen=0;
  if(isset($_SESSION["tenuser"]) && isset($_SESSION["quyen"])){
    $tenuser=$_SESSION["tenuser"];
    $quyen=$_SESSION["quyen"];
  }
  //Kết nối CSDL
  include_once('csdl/connect.php');
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
      button.dangnhap_btn_dangnhap{
        padding-left: 20px;
        padding-right: 20px;
        font-size: 17px;
      }
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
    <form name="frmDangky" action="taikhoan_xuly.php?tacvu=them" method="post" onsubmit="return kiemtra();">
      <div class="row" style="margin-top: 10px;">
        <!--Chi tiết tài khoản-->
        <div class="col-sm-6">
          <div class="card">
              <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">
                <div class="form-inline">
                  <img src="img/dangky_chitiettaikhoan.png" width="35px">
                  <h5 style="margin-left: 10px;">Chi tiết tài khoản</h5>
                </div>
              </div>
              <div class="card-body">
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Họ và tên lót:</label>
                  <input type="text" name="txtHotenlot" class="form-control" placeholder="Nhập họ và tên"></div>
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Tên:</label>
                  <input type="text" name="txtTen" class="form-control" placeholder="Nhập tên"></div>
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Email:</label>
                  <input type="text" name="txtEmail" class="form-control" placeholder="Nhập email"></div>
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Số điện thoại:</label>
                  <input type="text" name="txtSoDienThoai" class="form-control" placeholder="Nhập số điện thoại"></div>
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Mật khẩu đăng nhập:</label>
                  <input type="password" name="txtMatKhau" class="form-control" placeholder="Nhập mật khẩu đăng nhập"></div>
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Nhập lại mật khẩu đăng nhập:</label>
                  <input type="password" name="txtMatKhau_2" class="form-control" placeholder="Nhập mật khẩu đăng nhập"></div>
              </div>
          </div>
        </div>
        <!--Dang nhap-->
        <div class="col-sm-6">
            <!--Địa chỉ-->
            <div class="card">
              <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">
                 <div class="form-inline">
                  <img src="img/dangky_diachi.png" width="35px">
                  <h5 style="margin-left: 10px;">Địa chỉ</h5>
                </div>
              </div>
              <div class="card-body">      
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Huyện (thành phố):</label>
                   <select class="form-control" name="sltMahuyen">
                    <!--Hiện các huyện, thành phố-->
                    <?php
                      $sql="SELECT* FROM  vanchuyen_huyen";
                      $result=$conn->query($sql);
                      //Kiểm tra tồn tại
                      if($result->num_rows>0){
                        //Chèn các dòng
                        while($row = $result->fetch_assoc()) {
                          echo "<option value=".$row["Mahuyen"].">".$row["Tenhuyen"]."</option>";
                        }
                      }
                      //Đóng kết nối
                      $conn->close();
                    ?>
                  </select>
                </div>
                <!---->
                <div class="form-group">
                  <label class="dangnhap_lb">Ấp (khóm) và xã (phường):</label>
                  <input type="text" name="txtDC_2" class="form-control" placeholder="Nhập ấp (khóm) và xã (phường)"></div>
              </div>
            </div>
            <!--Xac nhan tai khon-->
            <div class="card" style="margin-top: 10px;">
              <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">
                <div class="form-inline">
                  <img src="img/dangky_xacnhan.png" width="35px">
                  <h5 style="margin-left: 10px;">Xác nhận</h5>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck" onclick="dangky_xacnhan();">
                  <label class="custom-control-label" for="customCheck">Tôi xác nhận những thông tin trên là đúng!</label>
                </div>
                <button type="submit" name="btn_dangky" class="btn btn-danger" style="margin-top: 20px;" disabled="true">Đăng ký tài khoản</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!--Footer-->
  <?php
    include_once('footer.php');
  ?>
</div>
</body>
</html>