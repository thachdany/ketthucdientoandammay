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
    $sql="SELECT tk.MaTaiKhoan, tk.HoTenLot, tk.Ten, tk.Email, tk.SoDienThoai, tk.DC_Ap, tk.DC_MaHuyen
    FROM taikhoan tk
    WHERE MaTaiKhoan='$mataikhoan'";
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
      $DC_MaHuyen=$row['DC_MaHuyen'];
    }
    //Đóng kết nối
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
  <script type="text/javascript">
    function Kiemtra(){
      if(frmDoimatkhau.txtMatkhauhientai.value==""){
        alert("Chưa nhập mật khẩu hiện tại!");
        return false;
      }else if(frmDoimatkhau.txtMatKhau.value==""){
        alert("Chưa nhập mật khẩu mới!");
        return false;
      }else if(frmDoimatkhau.txtMatKhau_2.value==""){
        alert("Chưa xác nhận lại mật khẩu!");
        return false;
      }else if(frmDoimatkhau.txtMatKhau.value!=frmDoimatkhau.txtMatKhau_2.value){
        alert("Mật khẩu xác nhận không khớp nhau!");
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
  
  <!--Trang giữa-->
  <div style="margin-left: 20px; margin-right: 20px;">
    <!--Hiện thị đường dẫn-->
    <div class="btn-group" style="margin-top: 10px;">
      <button type="button" class="btn btn-primary" onclick="window.open('index.php','_self');">
        <img src="../img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý tài khoản &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Đổi mật khẩu</button></div>
    <!--Bảng-->
    <div class="row" style="margin-top: 10px;" >
      <!--Menu danh sách-->
      <div class="col-3">
        <?php
          //Nạp từ file công cụ
          include_once('taikhoan_danhsachquanly.php');
        ?>
      </div>

     <div class="col-9">
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
        <form method="post" name="frmDoimatkhau" onsubmit="return Kiemtra();">
          <!--Chi tiết tài khoản-->
          <div class="card">
            <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">
              <div class="form-inline">
                <img src="../img/dangky_doimatkhau.png" width="35px">
                <h5 style="margin-left: 10px; font-weight: bold;">Đổi mật khẩu</h5>
              </div>
            </div>
            <div class="card-body row">
              <div class="col-4"></div>
              <div class="col-4">
                <!--Thông báo đăng nhập sai-->
                <div class="alert alert-danger alert-dismissible" id="div_saimatkhau" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Lỗi!</strong> Sai mật khẩu.
                </div>
                <!--Thông báo đã đổi mật khẩu-->
                <div class="alert alert-success alert-dismissible" id="div_doimatkhau" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Thông báo!</strong> Đã đổi mật khẩu.
                </div>
                <!---->
                <div class="form-group">
                  <label class="indam">Mật khẩu hiện tại:</label>
                  <input type="password" name="txtMatkhauhientai" class="form-control"
                  placeholder="Nhập mật khẩu hiện tại">
                </div>
                <!---->
                <div class="form-group">
                  <label class="indam">Mật khẩu mới:</label>
                  <input type="password" name="txtMatKhau" class="form-control"
                  placeholder="Nhập mật khẩu mới">
                </div>
                <!---->
                <div class="form-group">
                  <label class="indam">Nhập lại mật khẩu mới:</label>
                  <input type="password" name="txtMatKhau_2" class="form-control"
                  placeholder="Nhập lại mật khẩu mới">
                </div>
                <div style="text-align: center;">
                   <button type="submit" class="btn btn-danger">Lưu mật khẩu</button>
                </div>
              </div>              
            </div>
          </div>  
          
          <?php
            //Kiểm tra mật khẩu đúng không
            if(isset($_POST["txtMatkhauhientai"])&&isset($_POST["txtMatKhau"])){
              $matkhauhientai=md5($_POST["txtMatkhauhientai"]);
              $matkhaumoi=md5($_POST["txtMatKhau"]);
              //Đọc dữ liệu từ CSDL
              $sql="SELECT MatKhau FROM taikhoan WHERE MaTaiKhoan='$mataikhoan'";
              $result=$conn->query($sql);
              //Kiểm tra tồn tại
              if($result->num_rows>0){
                $row = $result->fetch_assoc();
                if($row['MatKhau']!=$matkhauhientai){
                  //Hiện thông báo
                  echo "<script>";
                  echo "document.getElementById('div_saimatkhau').style.display = 'block';";
                  echo "</script>";
                }else{
                  $sql="UPDATE TaiKhoan SET MatKhau='$matkhaumoi' WHERE MaTaiKhoan=$mataikhoan";
                  //Kết quả
                  if ($conn->query($sql) === TRUE) {
                    //Hiện thông báo
                    echo "<script>";
                    echo "document.getElementById('div_doimatkhau').style.display = 'block';";
                    echo "</script>";
                  }else{
                    echo "<script>alert('Có lỗi trong việc đổi mật khẩu mới!');</script>";
                  }
                }   
              }
          }
          ?>         
        </form>
      <!----> 
      </div>
      <!---->
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