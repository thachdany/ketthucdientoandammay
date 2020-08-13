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
        <img src="home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý cửa hàng &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Danh mục mặt hàng</button></div>
    <!--Bảng-->
    <div class="row" style="margin-top: 10px;" >
      <!--Menu danh sách-->
      <div class="col-3">
        <?php
          //Nạp từ file công cụ
          include_once('admin_danhmucquanly.php');
        ?>
      </div>
      <div class="col-9">
        <!---->
        <div class="card">
          <div class="card-header" style="background-color: green; border: #F5CFCF; color: white;">   
             <h4 style="font-weight: bold;">Danh sách Danh mục mặt hàng</h4>    
          </div>
          <div class="card-body row">
            <!--Chia gird hiện thị bảng-->
            <div class="col-2"></div>
            <div class="col-8">
              <button class="btn  btn-primary" style="margin-top: 10px; margin-bottom: 10px;"
                onclick="window.open('danhmuc_them.php','_self')">Thêm mới</button>
              <table class="table">
                <!--Tiêu đề-->
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align: center;">Số thứ tự</th>
                    <th>Tên danh mục</th>
                    <th>Tác vụ</th>
                  </tr>
                </thead> 
                <tbody>
                  <!--Style cho sửa, xóa-->
                  <style type="text/css">
                    .table_items{
                      background-color: #02576c;
                      padding: 5px 20px 5px 20px;
                      border-radius: 3px;
                      color: white;                      
                    }
                    .table_items:hover{
                      /*Xóa gạch chân*/
                      text-decoration: none;
                      background-color: #9c2c2c;
                      color: white;     
                    }
                  </style>
                  <?php
                    //Kết nối CSDL
                    include_once('csdl/connect.php');
                    $sql="SELECT* FROM Danhmuc";
                    $result=$conn->query($sql);
                    //Kiểm tra tồn tại
                    if($result->num_rows>0){
                      //Chèn các dòng
                      $i=1;
                      while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                        <?php
                        echo "<td style='text-align: center;'>".$i."</td><td>".$row["Tendanhmuc"]."</td>";
                        ?>
                        <td>
                          <a href="danhmuc_capnhat.php?id=<?php echo $row['Madanhmuc']; ?>" class="table_items">Sửa</a>
                          <a href="xuly_danhmuc.php?tacvu=xoa&id=<?php echo $row['Madanhmuc']; ?>" class="table_items" style="margin-left: 10px;">Xóa</a>
                        </td>
                        </tr>
                        <?php
                        $i=$i+1;
                      }
                      //Đóng kết nối
                      $conn->close();
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div></div>
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