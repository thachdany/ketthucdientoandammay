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
  </style>
  <script type="text/javascript">
    function Kiemtra(){
      if(frmMathang.txtTenmathang.value==""){
        alert('Chưa nhập tên mặt hàng!');
        return false;
      }else if(frmMathang.txtGiaban.value==""){
        alert('Chưa nhập giá bán!');
        return false;
      }else if(frmMathang.txtMota.value==""){
        alert('Chưa nhập mô tả!');
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
      <button type="button" class="btn btn-primary">
        <img src="../img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý cửa hàng &#10095;</button>
      <button type="button" class="btn btn-primary"
        onclick="window.open('mathang_danhsach.php','_self');">Mặt hàng &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Thêm mới</button>
    </div>
    <!--Bảng-->
    <div class="row" style="margin-top: 10px;">
      <!--Menu danh sách-->
      <div class="col-sm-3">
        <?php
          //Nạp từ file công cụ
          include_once('../congcu/admin_danhmucquanly.php');
        ?>
      </div>
      <div class="col-sm-9">
        <div class="card">
            <div class="card-header" style="background-color: green; border: #F5CFCF; color: white;">
              <h5 style="font-weight: bold;">Thêm mới mặt hàng</h5>
            </div>
            <div class="card-body row">
              <div class="col-3"></div>
              <div class="col-6">
                <form name="frmMathang" action="xuly_upload.php?tacvu=them" method="post" onsubmit="return Kiemtra();"
                enctype="multipart/form-data">
                  <!--mặt hàng-->
                  <div class="form-group">
                    <label style="font-weight: bold;">Tên mặt hàng:</label>
                    <input type="text" class="form-control" placeholder="Nhập tên mặt hàng" name="txtTenmathang">
                  </div>
                  <!--danh mục-->
                  <div class="form-group">
                    <label style="font-weight: bold;">Danh mục mặt hàng:</label>
                    <select class="form-control" name="sltDanhmuc">
                      <?php
                        //Kết nối CSDL
                        include_once('csdl/connect.php');
                        $sql="SELECT* FROM danhmuc";
                        $result=$conn->query($sql);
                        //Kiểm tra tồn tại
                        if($result->num_rows>0){
                          //Chèn các dòng
                          while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row["Madanhmuc"].">".$row["Tendanhmuc"]."</option>";
                          }
                        }
                        //Ngắt kết nối
                        $conn->close();
                      ?>
                    </select>
                  </div>
                  <!--danh mục mặt hàng-->
                  <div class="form-group">
                    <label style="font-weight: bold;">Giá bán:</label>
                    <input type="text" class="form-control" placeholder="Nhập giá bán" name="txtGiaban">
                  </div>
                   <!--hình-->
                  <div class="form-group">
                    <label style="font-weight: bold;">Hình ảnh:</label>
                    <input type="file" name="fileToUpload" class="form-control-file border">
                  </div>
                  
                  <!--danh mục mặt hàng-->
                  <div class="form-group">
                    <label style="font-weight: bold;">Mô tả:</label>
                    <textarea class="form-control" rows="5" name="txtMota"></textarea>
                  </div>
                  <!--Button-->
                  <div align="center">
                    <input type="submit" class="btn btn-primary" value="Lưu" name="submit">
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
    include_once('../congcu/footer.php');
  ?>
  <!---->
</div>
</body>
</html>