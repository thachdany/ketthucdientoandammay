<?php
   //Kiem tra dang nhap hay chua
  session_start();
  $tenuser="";
  $quyen=0;
  if(isset($_SESSION["tenuser"]) && isset($_SESSION["quyen"])){
    $tenuser=$_SESSION["tenuser"];
    $quyen=$_SESSION["quyen"];
  }
  //
  $mahang="";
  $txtTenmathang="";
  $sltDanhmuc="";
  $txtGiaban="";
  $txtMota="";
  //Nhận giá trị
  if(isset($_GET["id"])){
    $mahang=$_GET["id"];
    //Kết nối CSDL
    include_once('csdl/connect.php');
    $sql="SELECT* FROM Mathang WHERE MaHang='$mahang'";
    $result=$conn->query($sql);
    //Kiểm tra tồn tại
    if($result->num_rows>0){
      $row = $result->fetch_assoc();
      //Nhan du lieu
      $txtTenmathang=$row["TenHang"];
      $sltDanhmuc=$row["Madanhmuc"];
      echo $sltDanhmuc;
      $txtGiaban=$row["GiaBan"];
      $txtMota=$row["Mota"];
    }
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
      <button type="button" class="btn btn-primary">
        <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý cửa hàng &#10095;</button>
      <button type="button" class="btn btn-primary"
        onclick="window.open('mathang_danhsach.php','_self');">Mặt hàng &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Cập nhật</button>
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
          <div class="card-header" style="background-color: green; border: #F5CFCF; color: white;">
            <h4 align="center" style="font-weight: bold;">Cập nhật mặt hàng</h4>               
          </div>
          <div class="card-body row">
            <div class="col-3"></div>
            <div class="col-6">
              <!------------------------------------------->
              <form action="xuly_upload.php?tacvu=sua&id=<?php echo $mahang; ?>" method="post" enctype="multipart/form-data">
                <!--mặt hàng-->
                <div class="form-group">
                  <label style="font-weight: bold;">Tên mặt hàng:</label>
                  <input type="text" class="form-control" placeholder="Nhập tên mặt hàng" name="txtTenmathang"
                  value="<?php echo $txtTenmathang; ?>">
                </div>
                <!--danh mục-->
                <div class="form-group">
                  <label style="font-weight: bold;">Danh mục mặt hàng:</label>
                  <select class="form-control" name="sltDanhmuc">
                    <?php
                      //Kết nối CSDL
                      $sql="SELECT* FROM danhmuc";
                      $result=$conn->query($sql);
                      //Kiểm tra tồn tại
                      if($result->num_rows>0){
                        //Chèn các dòng
                        while($row = $result->fetch_assoc()) {
                          if($row["Madanhmuc"]!=$sltDanhmuc)
                            echo "<option value=".$row["Madanhmuc"].">".$row["Tendanhmuc"]."</option>";
                          else
                            echo "<option value=".$row["Madanhmuc"]." selected>".$row["Tendanhmuc"]."</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
                <!--danh mục mặt hàng-->
                <div class="form-group">
                  <label style="font-weight: bold;">Giá bán:</label>
                  <input type="text" class="form-control" placeholder="Nhập giá bán" name="txtGiaban"
                  value="<?php echo $txtGiaban; ?>">
                </div>
                 <!--hình-->
                <div class="form-group">
                    <label style="font-weight: bold;">Hình ảnh:</label>
                    <input type="file" name="fileToUpload" class="form-control-file border">
                </div>             
                <!--danh mục mặt hàng-->
                <div class="form-group">
                  <label style="font-weight: bold;">Mô tả:</label>
                  <textarea class="form-control" rows="5" name="txtMota"><?php echo $txtMota; ?></textarea>
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
    include_once('footer.php');
    $conn->close();
  ?>
  <!---->
</div>
</body>
</html>