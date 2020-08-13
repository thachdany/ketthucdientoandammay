<?php
  //Kiem tra dang nhap hay chua
  session_start();
  $tenuser="";
  $quyen=0;
  if(isset($_SESSION["tenuser"]) && isset($_SESSION["quyen"])){
    $tenuser=$_SESSION["tenuser"];
    $quyen=$_SESSION["quyen"];
  }
  //Kiểm tra CSDL
  $tendanhmuc="";
  $madanhmuc="";
  //Nhận giá trị
  if(isset($_GET["id"])){
    $madanhmuc=$_GET["id"];
    //Kết nối CSDL
    include_once('csdl/connect.php');
    $sql="SELECT* FROM Danhmuc WHERE madanhmuc='$madanhmuc'";
    $result=$conn->query($sql);
    //Kiểm tra tồn tại
    if($result->num_rows>0){
      $row = $result->fetch_assoc();
      //Nhan du lieu
      $tendanhmuc=$row["Tendanhmuc"];
    }
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
  <!--Hiện thị đường dẫn-->
  <div style="margin-left: 20px; margin-right: 20px;">
    <div class="btn-group" style="margin-top: 10px;">
      <button type="button" class="btn btn-primary"><img src="shome_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý cửa hàng &#10095;</button>
      <button type="button" class="btn btn-primary"
        onclick="window.open('danhmuc_danhsach.php','_self');">Danh sách &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Cập nhật</button></div><div>
  </div>
   <!---->
  <div class="row" style="margin-top: 10px;">
    <!--Menu danh sách-->
    <div class="col-3">
      <?php
        //Nạp từ file công cụ
        include_once('admin_danhmucquanly.php');
        ?>
    </div>
    <!---->
    <div class="col-9">
      <div class="card">
        <div class="card-header" style="background-color: #F5CFCF; border: #F5CFCF; color: #AB2F56;">       
          <h4 style="font-weight: bold;">Cập nhật Danh mục mặt hàng</h4>
        </div>
        <div class="card-body row">
          <div class="col-4"></div>
          <div class="col-4">
            <form action="xuly_danhmuc.php?tacvu=sua&id=<?php echo $madanhmuc; ?>" method="post">
              <!--danh mục mặt hàng-->
              <div class="form-group">
                <label style="font-weight: bold;">Tên danh mục mặt hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập danh mục mặt hàng" name="txtTendanhmuc" value="<?php echo $tendanhmuc; ?>">
              </div>
              <!--Button-->
              <div align="center">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <button type="reset" class="btn btn-secondary">Hủy</button>
              </div>       
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!---->
  <!--Footer-->
  <?php
    include_once('footer.php');
  ?>
</div>
</body>
</html>