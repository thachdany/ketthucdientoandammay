<?php
  //Kiem tra dang nhap hay chua
  session_start();
  $tenuser="";
  $quyen=0;
  if(isset($_SESSION["tenuser"]) && isset($_SESSION["quyen"])){
    $tenuser=$_SESSION["tenuser"];
    $quyen=$_SESSION["quyen"];
  }
  //Ket noi CSDL
  include_once('csdl/connect.php');
  //Kiểm tra có mã danh mục hay không
  $madanhmuc="";
  if(isset($_GET['madanhmuc'])){
    $madanhmuc=$_GET['madanhmuc'];
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
  <!--Dang ky va dang nhap-->
  <div class="row" style="padding-left: 20px; padding-right: 20px;">
    <div class="col-1"></div>
    <div class="col-10">
      <!--Bat Dau-->
      <div class="row" style="margin-top: 30px;">
        <div class="col-4">
          <?php
            //Menu
            include('menudanhmucsanpham.php');
          ?>
        </div>
        <div class="col-8">
          <!--Hiện thị đường dẫn-->
          <?php
            include('danhmucsanpham_duongdan.php')
          ?>
          <!--Hiện thị danh sách-->
          <style type="text/css">
            /*Hình ảnh*/
            .items_khung{
              border:1px solid #ee046c;
              border-radius: 10px;
              padding-left: 20px;
              padding-bottom: 20px;
              padding-top: 20px;
              margin-bottom: 10px;
              /*Canh giữa*/
              display: flex;
              align-items: center;
            }
          </style>
          <!--Get items từ CSDL, Phân trang-->
          <?php 
            // PHẦN XỬ LÝ PHP
            // BƯỚC 1: KẾT NỐI CSDL
            //include_once('../csdl/connect.php');  
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            //Kiểm tra có danh mục nào không
            $sql_result="";
            if($madanhmuc!=""){
              //Đếm Record
              $sql_result="select count(MaHang) as total from mathang WHERE Madanhmuc='$madanhmuc'";
            }else{
              //Đếm Record
              $sql_result='select count(MaHang) as total from mathang';
            }
            //$result=$conn->query($sql_result);
            $result = mysqli_query($conn, $sql_result);
            //Kiểm tra coi có mẫu tin nào không?
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
            //Biến dùng để lưu link nếu có chọn danh mục
            $a_link="";
            if($madanhmuc!=""){
              //Get giá trị
              $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh
              FROM mathang mh
              WHERE mh.Madanhmuc='$madanhmuc'
              LIMIT $start, $limit";
              $a_link="madanhmuc=".$madanhmuc."&";
            }else{
              //Get giá trị
              $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh
              FROM mathang mh
              LIMIT $start, $limit";
            }            
            $result = mysqli_query($conn, $sql);     
          ?>
          <!--Hiện thị danh sách-->          
          <div style="margin-top: 10px;">
            <!--Danh sách các items-->
            <?php
              //Kiểm tra tồn tại
              if($result==true && mysqli_num_rows($result)>0){
                $i=(($current_page*$limit)-$limit)+1;
                //Chèn các dòng
                while($row = $result->fetch_assoc()) {
                  $tenhang=$row['TenHang'];
                  $giaban=$row['GiaBan'];
                  $linkanh=$row['LinkAnh'];
                  ?>
                  <div class="row items_khung">
                    <img class="items_hinhanh" class="rounded" width="120px"
                    src="/<?php echo $linkanh; ?>">
                    <div style="padding-left: 25px;">
                      <h3 style="font-size: 20px; margin-bottom: 10px;"><?php echo $tenhang; ?></h3>
                      <div class="form-inline" style="margin-bottom: 10px;">
                        <img src="img/danhsachmathang_dong.png" width="22px" height="22px"
                        style="margin-right: 10px;">
                        <h4 style="font-weight: bold; color: #f79c1d; "><?php echo $giaban; ?></h4>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-danger">Mua Ngay</button>
                        <button class="btn btn-danger"
                        onclick="window.open('sanpham_chitietsanpham.php?id=<?php echo $row["MaHang"]; ?>','_self');">Chi tiết</button>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }else{
                echo "Không có mặt hàng nào!";
              }
            ?>
          </div>
          <!--Phân trang-->
          <style type="text/css">
            a.page-link{
              color: #d61d4e;
            }
            a.page-link:hover{
              background-color: #ffdee6;
              color: #d61d4e;
            }
          </style>
          <ul class="pagination" style="justify-content: center;">
            <?php 
              // PHẦN HIỂN THỊ PHÂN TRANG
              // BƯỚC 7: HIỂN THỊ PHÂN TRANG
              // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
              if ($current_page > 1 && $total_page > 1){
                  //echo '<li class="page-item"><a href="mathang_danhsach.php?page='.($current_page-1).'">Prev</a></li>';
                echo '<li class="page-item"><a class="page-link" href="danhsachmathang.php?'.$a_link.'page='.($current_page-1).'">Lùi lại</a></li>';
              }
              // Lặp khoảng giữa
              for ($i = 1; $i <= $total_page; $i++){
                  // Nếu là trang hiện tại thì hiển thị thẻ span
                  // ngược lại hiển thị thẻ a
                  if ($i == $current_page){
                    echo '<li class="page-item active"><a class="page-link" style="background-color: #f38181; border-color: #f38181; color: #d61d4e;">'.$i.'</a></li>';
                  }
                  else{
                    echo '<li class="page-item"><a class="page-link" href="danhsachmathang.php?'.$a_link.'page='.$i.'">'.$i.'</a></li>';
                  }
              }
              // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
              if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="danhsachmathang.php?'.$madanhmuc.'page='.($current_page+1).'">Tiếp tục</a></li>';
              }
            ?>
          </ul>
          <!--Het-->
        </div>
      </div>
      <!--Het-->
    <div class="col-1"></div>
  </div> 
  <!--Footer-->
  <?php
    include_once('footer.php');
  ?>
</div>
</body>
</html>