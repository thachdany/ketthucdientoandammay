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
            <style>
              /* Make the image fully responsive */
              .carousel-inner img {
                  width: 100%;
                  height: 100%;
              }
            </style>
            <div id="demo" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/wpc_01.jpg" style="border-radius: 10px;" width="750" height="400">
                </div>
                <div class="carousel-item">
                  <img src="img/wpc_02.jpg" style="border-radius: 10px;" width="750" height="400"-->
                </div>
                <div class="carousel-item">
                  <img src="img/wpc_03.jpg" style="border-radius: 10px;" width="750" height="400">
                </div>
              </div>
              
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
        </div>
      </div>
      <!--Bat Dau-->
      <style type="text/css">
        .home_list_items{
          border: 1px solid #738598;
          border-radius: 5px;
          margin-right: 10px;
        }
        .home_list_items_ten{
          font-weight: bold;
        }
      </style>
      <!--Bó Hoa Tươi-->
      <div>
        <a href="danhsachmathang.php?madanhmuc=1">
          <h5 style="color: #480032; margin-top: 10px; margin-bottom: 10px;">Bó Hoa Tươi</h5>
        </a>        
        <!--4 hoa-->
        <div class="row">
          <?php
            $madanhmuc='1';
            //Nhận giá trị (4 giá trị)
            $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh
              FROM mathang mh
              WHERE mh.Madanhmuc='$madanhmuc'
              LIMIT 0, 4";
            $result = mysqli_query($conn, $sql);
            if($result==true && mysqli_num_rows($result)>0){
              while($row = $result->fetch_assoc()) {
                $link="sanpham_chitietsanpham.php?id=".$row['MaHang'];
                //Chèn HTML
                ?>
                <div class="col-3">
                  <div class="home_list_items">
                    <a href="<?php echo $link; ?>">
                      <img class=".thumb" src="<?php echo $row['LinkAnh']; ?>" width="50%" style=" display: block; margin-left: auto; margin-right: auto;">
                    </a>                    
                    <div style="text-align: center;">                  
                        <a href="<?php echo $link; ?>"><?php echo $row['TenHang'];?></a>
                        <h6 style="color: #8f1537;"><?php echo $row['GiaBan']; ?> VNĐ</h6>
                      </div>
                  </div>
                </div>
                <?php
                //Đóng chèn HTML
              }
            }
          ?>          
          <!--Het-->
        </div>
      </div>
      <!--Hộp Hoa Tươi-->
      <div>
        <a href="danhsachmathang.php?madanhmuc=2">
          <h5 style="color: #480032; margin-top: 10px; margin-bottom: 10px;">Hộp Hoa Tươi</h5>
        </a>
        <!--4 hoa-->
        <div class="row">
          <?php
            $madanhmuc='2';
            //Nhận giá trị (4 giá trị)
            $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh
              FROM mathang mh
              WHERE mh.Madanhmuc='$madanhmuc'
              LIMIT 0, 4";
            $result = mysqli_query($conn, $sql);
            if($result==true && mysqli_num_rows($result)>0){
              while($row = $result->fetch_assoc()) {
                $link="sanpham_chitietsanpham.php?id=".$row['MaHang'];
                //Chèn HTML
                ?>
                <div class="col-3">
                  <div class="home_list_items">
                    <a href="<?php echo $link; ?>">
                      <img class=".thumb" src="<?php echo $row['LinkAnh']; ?>" width="50%" style=" display: block; margin-left: auto; margin-right: auto;">
                    </a>                    
                    <div style="text-align: center;">                  
                        <a href="<?php echo $link; ?>"><?php echo $row['TenHang'];?></a>
                        <h6 style="color: #8f1537;"><?php echo $row['GiaBan']; ?> VNĐ</h6>
                      </div>
                  </div>
                </div>
                <?php
                //Đóng chèn HTML
              }
            }
          ?>          
          <!--Het-->
        </div>
      </div>
      <!--Giỏ Hoa Tươi-->
      <div>
        <a href="danhsachmathang.php?madanhmuc=3">
          <h5 style="color: #480032; margin-top: 10px; margin-bottom: 10px;">Giỏ Hoa Tươi</h5>
        </a>
        <!--4 hoa-->
        <div class="row">
          <?php
            $madanhmuc='3';
            //Nhận giá trị (4 giá trị)
            $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh
              FROM mathang mh
              WHERE mh.Madanhmuc='$madanhmuc'
              LIMIT 0, 4";
            $result = mysqli_query($conn, $sql);
            if($result==true && mysqli_num_rows($result)>0){
              while($row = $result->fetch_assoc()) {
                $link="sanpham_chitietsanpham.php?id=".$row['MaHang'];
                //Chèn HTML
                ?>
                <div class="col-3">
                  <div class="home_list_items">
                    <a href="<?php echo $link; ?>">
                      <img class=".thumb" src="<?php echo $row['LinkAnh']; ?>" width="50%" style=" display: block; margin-left: auto; margin-right: auto;">
                    </a>                    
                    <div style="text-align: center;">                  
                        <a href="<?php echo $link; ?>"><?php echo $row['TenHang'];?></a>
                        <h6 style="color: #8f1537;"><?php echo $row['GiaBan']; ?> VNĐ</h6>
                      </div>
                  </div>
                </div>
                <?php
                //Đóng chèn HTML
              }
            }
          ?>          
          <!--Het-->
        </div>
      </div>
      <!--Bình Hoa Tươi-->
      <div>
        <a href="danhsachmathang.php?madanhmuc=4">
          <h5 style="color: #480032; margin-top: 10px; margin-bottom: 10px;">Bình Hoa Tươi</h5>
        </a>
        <!--4 hoa-->
        <div class="row">
          <?php
            $madanhmuc='4';
            //Nhận giá trị (4 giá trị)
            $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh
              FROM mathang mh
              WHERE mh.Madanhmuc='$madanhmuc'
              LIMIT 0, 4";
            $result = mysqli_query($conn, $sql);
            if($result==true && mysqli_num_rows($result)>0){
              while($row = $result->fetch_assoc()) {
                $link="sanpham_chitietsanpham.php?id=".$row['MaHang'];
                //Chèn HTML
                ?>
                <div class="col-3">
                  <div class="home_list_items">
                    <a href="<?php echo $link; ?>">
                      <img class=".thumb" src="<?php echo $row['LinkAnh']; ?>" width="50%" style=" display: block; margin-left: auto; margin-right: auto;">
                    </a>                    
                    <div style="text-align: center;">                  
                        <a href="<?php echo $link; ?>"><?php echo $row['TenHang'];?></a>
                        <h6 style="color: #8f1537;"><?php echo $row['GiaBan']; ?> VNĐ</h6>
                      </div>
                  </div>
                </div>
                <?php
                //Đóng chèn HTML
              }
            }
          ?>          
          <!--Het-->
        </div>
      </div>
      <!--Hoa tình yêu-->
      <div>
        <a href="danhsachmathang.php?madanhmuc=5">
          <h5 style="color: #480032; margin-top: 10px; margin-bottom: 10px;">Hoa Tình Yêu</h5>
        </a>
        <!--4 hoa-->
        <div class="row">
          <?php
            $madanhmuc='5';
            //Nhận giá trị (4 giá trị)
            $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh
              FROM mathang mh
              WHERE mh.Madanhmuc='$madanhmuc'
              LIMIT 0, 4";
            $result = mysqli_query($conn, $sql);
            if($result==true && mysqli_num_rows($result)>0){
              while($row = $result->fetch_assoc()) {
                $link="sanpham_chitietsanpham.php?id=".$row['MaHang'];
                //Chèn HTML
                ?>
                <div class="col-3">
                  <div class="home_list_items">
                    <a href="<?php echo $link; ?>">
                      <img class=".thumb" src="<?php echo $row['LinkAnh']; ?>" width="50%" style=" display: block; margin-left: auto; margin-right: auto;">
                    </a>                    
                    <div style="text-align: center;">                  
                        <a href="<?php echo $link; ?>"><?php echo $row['TenHang'];?></a>
                        <h6 style="color: #8f1537;"><?php echo $row['GiaBan']; ?> VNĐ</h6>
                      </div>
                  </div>
                </div>
                <?php
                //Đóng chèn HTML
              }
            }
          ?>          
          <!--Het-->
        </div>
      </div>

      <!--Het-->
    <div class="col-1"></div>
  </div> 
  <!--Footer-->
  <?php
    include_once('footer.php');
    $conn->close();
  ?>
</div>

</body>
</html>