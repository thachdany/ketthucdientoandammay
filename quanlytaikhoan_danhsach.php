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
  <!--Hiện thị đường dẫn-->
  <div style="margin-left: 20px; margin-right: 20px;">
    <div class="btn-group" style="margin-top: 10px;">
      <button type="button" class="btn btn-primary" onclick="window.open('index.php','_self');">
        <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
      <button type="button" class="btn btn-primary">Quản lý cửa hàng &#10095;</button>
      <button type="button" class="btn btn-outline-primary"
        onclick="location.reload();">Mặt hàng</button>
    </div>
  <div>
  <!--Bảng-->
  <div class="row" style="margin-top: 10px;">
    <!--Menu danh sách-->
    <div class="col-3">
      <?php
        //Nạp từ file công cụ
        include_once('admin_danhmucquanly.php');
      ?>
    </div>
    <div class="col-9">
      <div class="card">
        <div class="card-header" style="background-color: green; border: #F5CFCF; color: white;">
           <h4 style="font-weight: bold;">Danh sách mặt hàng</h4>
        </div>
        <div class="card-body">
          <button class="btn  btn-primary" style="margin-top: 10px; margin-bottom: 10px;"
            onclick="window.open('mathang_them.php','_self')">Thêm mới</button>
          <!--Phân Trang-->
          <?php 
            // PHẦN XỬ LÝ PHP
            // BƯỚC 1: KẾT NỐI CSDL
            include_once('csdl/connect.php');  
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            $result = mysqli_query($conn, 'select count(MaTaiKhoan) as total from taikhoan');
            $total_records=0;
            if($result==TRUE){              
              $row = mysqli_fetch_assoc($result);
              $total_records = $row['total'];     
            }
            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;     
            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // tổng số trang
            $total_page = ceil($total_records / $limit);     
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }     
            // Tìm Start
            $start = ($current_page - 1) * $limit;     
            // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            //Chỉ xem tài khoản người dùng (quyền 1)
            $sql="SELECT MaTaiKhoan, Ten, Email FROM taikhoan WHERE Quyen='1' LIMIT $start, $limit";
            $result = mysqli_query($conn, $sql);     
          ?>
          <!--Phân Trang-->
          <table class="table">
            <!--Tiêu đề-->
            <thead class="thead-dark">
              <tr>
                <th style='text-align: center;'>Số thứ tự</th>
                <th>Tên</th>
                <th>Email</th>
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
                  //Kiểm tra tồn tại
                  if($result==true && $result->num_rows>0){
                    $i=(($current_page*$limit)-$limit)+1;
                    //Chèn các dòng
                    while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                      <?php
                      echo "<td style='text-align: center;'>".$i."</td>"."<td>".$row["Ten"]."</td>"."<td>".$row["Email"]."</td>";
                      ?>
                      <td>
                        <a href="taikhoan_xuly.php?tacvu=xoa&id=<?php echo $row['MaTaiKhoan']; ?>" class="table_items" style="margin-left: 10px;">Xóa</a>
                      </td>
                      </tr>
                      <?php
                      $i=$i+1;
                    } 
                  }
                  //Ngắt kết nối
                  $conn->close();
                ?>
            </tbody>
          </table>
          <ul class="pagination" style="justify-content: center;">
            <?php 
              // PHẦN HIỂN THỊ PHÂN TRANG
              // BƯỚC 7: HIỂN THỊ PHÂN TRANG
              // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
              if ($current_page > 1 && $total_page > 1){
                  //echo '<li class="page-item"><a href="mathang_danhsach.php?page='.($current_page-1).'">Prev</a></li>';
                echo '<li class="page-item"><a class="page-link" href="mathang_danhsach.php?page='.($current_page-1).'">Previous</a></li>';
              }
              // Lặp khoảng giữa
              for ($i = 1; $i <= $total_page; $i++){
                  // Nếu là trang hiện tại thì hiển thị thẻ span
                  // ngược lại hiển thị thẻ a
                  if ($i == $current_page){
                      //echo '<span>'.$i.'</span> | ';
                    echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
                  }
                  else{
                      //echo '<li class="page-item"><a href="mathang_danhsach.php?page='.$i.'">'.$i.'</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="mathang_danhsach.php?page='.$i.'">'.$i.'</a></li>';
                  }
              }
              // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
              if ($current_page < $total_page && $total_page > 1){
                //echo '<li class="page-item"><a href="mathang_danhsach.php?page='.($current_page+1).'">Next</a></li>';
                echo '<li class="page-item"><a class="page-link" href="mathang_danhsach.php?page='.($current_page+1).'">Next</a></li>';
              }
            ?>
          </ul>
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