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
  //Kiểm tra có mã mặt hàng hay không?
  $mahang="";
  $giaban="";
  $mota="";
  $linkanh="";
  $tenmathang="";
  if(isset($_GET["id"])){
    $mahang=$_GET["id"];
    $sql="SELECT mh.MaHang, mh.TenHang, mh.GiaBan, mh.LinkAnh, mh.Mota
              FROM mathang mh
              WHERE mh.MaHang='$mahang'";
    $result = mysqli_query($conn, $sql);
    if($result==true && mysqli_num_rows($result)>0){
      $row = $result->fetch_assoc();
      //Nhận giá trị
      $tenmathang=$row['TenHang'];
      $giaban=$row['GiaBan'];
      $linkanh=$row['LinkAnh'];
      $mota=$row['Mota'];
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
          <div>
            <style type="text/css">
              .btn_parent{
                background-color: #099a97;
                border-color: #099a97;
                color: white;
              }
              .btn_child{
                background-color: white;
                border-color: #099a97;
                color: #099a97;
              }
            </style>
            <div class="btn-group">
              <button type="button" class="btn btn_parent" onclick="window.open('../trangchu/trangchu_home.php','_self');">
                <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
              <button type="button" class="btn btn_parent"
                onclick="window.history.back();">Sản phẩm &#10095;</button>
              <button type="button" class="btn btn_child"
                onclick="location.reload();">Giới Thiệu</button>
            </div>
          </div>
          <!--Nội dung-->
          <div class="row" style="margin-top: 10px; margin-left: 1px;">
            <!--Bat dau-->
            <!--Hình-->
            <div class="col-6" style="padding-right: 0px; padding-left: 0px;">
              <style type="text/css">
                .label_gia{
                  color: #f87829;
                  font-weight: bold;
                  /*background-color: #f9f8eb;*/
                  padding-top: 1px;
                  padding-bottom: 1px;
                }
              </style>
              <div style="border:1px solid #5c848e; border-radius: 5px;">
                <div style="justify-content: center;">
                  <img src="mathang/<?php echo $linkanh; ?>" width="100%" style="padding-left: 10px; padding-right: 10px;">  
                </div>
                            
                <hr  size="5px" color="#5c848e" /> 
                <div style="text-align: center;">
                  <label style="font-weight: bold;">Giá bán:</label>
                  <h4 class="label_gia"><?php echo $giaban; ?></h4>
                  <button type="button" class="btn btn-success" style="padding-right: 30%; padding-left: 30%; margin-bottom: 10px;">Mua Ngay</button>
                </div>
              </div>
            </div>
            <!--Nội dung-->
            <div class="col-6">
              <!--Tên-->
              <h4><?php echo $tenmathang; ?></h4>
              <hr  size="5px" color="#bee4d2" />
              <label style="text-align:justify"><?php echo $mota; ?></label>
              <style type="text/css">
                .panel_luuy{
                  border-radius: 5px; 
                  padding: 10px 10px 10px 10px;
                  font-size: 15px;
                  background-color: #d0efb5; 
                  border: 1px solid #a1c45a;
                  margin-top: 10px; color:
                  #4a772f;
                }
                .panel_khuyenmai{
                  border-radius: 5px;
                  background-color: #fbeed7;
                  padding: 10px 10px 10px 10px;
                  border: 1px solid #f16821;
                  margin-top: 10px;
                  color: #f05a28;
                  font-size: 14px;
                }
              </style>
              <!--Lưu ý-->
              <div class="panel_luuy">
                <label style="font-weight: bold;">Lưu ý: Sản phẩm chỉ có ở thành phố Trà Vinh</label>
                <label>Hiện nay, Shophoatuoitravinh.com chỉ thử nghiệm cung cấp cho thị trường Tp. Trà Vinh</label>
                <label>Miễn phí giao hoa trong <b>nội ô Tp. Trà Vinh</b></label>
                <label>Các huyện còn lại tùy vào khoảng cách sẽ tính phí vận chuyển khác nhau.</label>
              </div>
              <!--Khuyến mãi-->
               <div class="panel_khuyenmai">
                 <label><b>Tặng banner, thiệp</b> (trị giá 20.000đ) miễn phí</label>
                 <label><b>Giảm 10%</b> cho các đơn hàng trên 300.000 đ</label>
                 <label><b>Giao nhanh</b> trong vòng 2 giờ (nội ô Tp. Trà Vinh)</label>
                 <label>Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</label>
                 <label>Cam kết hoa tươi trên 3 ngày</label>
              </div>
            </div>
            <!--Het-->
          </div>         
          <!--Het-->
        </div>
      </div>
      <!--Het-->
    <div class="col-1"></div>
  </div> 
  <!--Footer-->
  <?php
    include_once('footer.php');
    //Đóng CSDL
    $conn->close();
  ?>
</div>
</body>
</html>