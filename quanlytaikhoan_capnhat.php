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
      if(frmCapnhat.txtHotenlot.value==""){
        alert("Chưa nhập họ và tên lót!");
        return false;
      }else if(frmCapnhat.txtTen.value==""){
        alert("Chưa nhập tên!");
        return false;
      }else if(frmCapnhat.txtEmail.value==""){
        alert("Chưa nhập Email!");
        return false;
      }else if(frmCapnhat.txtSoDienThoai.value==""){
        alert("Chưa nhập số điện thoại!");
        return false;
      }else if(frm.txtDC_2.value==""){
        alert("Chưa nhập địa chỉ ấp (khóm) và xã (phường)!");
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
    include_once('.header_lon.php');
  ?>
  <!--NavBar-->
  <?php
    include_once('
    navbar.php');
  ?>
  
  <!--Trang giữa-->
  <div style="margin-left: 20px; margin-right: 20px;">
    <!--Hiện thị đường dẫn-->
    <div class="btn-group" style="margin-top: 10px;">
      <button type="button" class="btn btn-primary" onclick="window.open('index.php','_self');">
        <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý tài khoản &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Cập nhật tài khoản</button></div>
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
        <form method="post" name="frmCapnhat" action="taikhoan_xuly.php?tacvu=sua&id=<?php echo $mataikhoan; ?>" onsubmit="return Kiemtra();">
          <div class="row">
             <!--Chi tiết tài khoản-->
            <div class="col-6">
                <div class="card">
                  <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">
                    <div class="form-inline">
                      <img src="img/dangky_chitiettaikhoan.png" width="35px">
                      <h5 style="margin-left: 10px; font-weight: bold;">Chi tiết tài khoản</h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <!---->
                    <div class="form-group">
                      <label class="indam">Họ và tên lót:</label>
                      <input type="text" name="txtHotenlot" class="form-control"
                      placeholder="Nhập họ và tên" value="<?php echo $HoTenLot; ?>"></div>
                    <!---->
                    <div class="form-group">
                      <label class="indam">Tên:</label>
                      <input type="text" name="txtTen" class="form-control"
                      placeholder="Nhập tên" value="<?php echo $Ten; ?>"></div>
                    <!---->
                    <div class="form-group">
                      <label class="indam">Email:</label>
                      <input type="text" name="txtEmail" class="form-control"
                      placeholder="Nhập email" value="<?php echo $Email; ?>"></div>
                    <!---->
                    <div class="form-group">
                      <label class="indam">Số điện thoại:</label>
                      <input type="text" name="txtSoDienThoai" class="form-control"
                      placeholder="Nhập số điện thoại" value="<?php echo $SoDienThoai; ?>">
                    </div>
                  </div>
                </div>
            </div>
             <!--Chi tiết tài khoản-->
            <div class="col-6">
              <div class="card">
                <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">
                  <div class="form-inline">
                    <img src="img/dangky_diachi.png" width="35px">
                    <h5 style="margin-left: 10px; font-weight: bold;">Địa chỉ</h5>
                  </div>
                </div>
                <div class="card-body">      
                  <!---->
                  <div class="form-group">
                    <label class="indam">Huyện (thành phố):</label>
                     <select class="form-control" name="sltMahuyen">
                      <!--Hiện các huyện, thành phố-->
                      <?php
                        $sql="SELECT* FROM  vanchuyen_huyen";
                        $result=$conn->query($sql);
                        //Kiểm tra tồn tại
                        if($result->num_rows>0){
                          //Chèn các dòng
                          while($row = $result->fetch_assoc()) {
                            if($row["Mahuyen"]!=$Mahuyen)
                              echo "<option value=".$row["Mahuyen"].">".$row["Tenhuyen"]."</option>";
                            else
                              echo "<option value=".$row["Mahuyen"]." selected>".$row["Tenhuyen"]."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                  <!---->
                  <div class="form-group">
                    <label class="indam">Ấp (khóm) và xã (phường):</label>
                    <input type="text" name="txtDC_2" class="form-control"
                    placeholder="Nhập ấp (khóm) và xã (phường)" value="<?php echo $DC_Ap; ?>"></div>
                </div>
              </div>
              <!---->
               <button type="submit" name="btn_dangky" class="btn btn-danger" style="margin-top: 20px;">Lưu thông tin</button>
            </div>
          </div>          
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