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
    <div class="col-10" style="margin-left: 20px; margin-right: 20px;">
      <!--Bat Dau-->
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
        <div class="btn-group" style="margin-top: 10px;">
          <button type="button" class="btn btn_parent" onclick="window.open('index.php','_self');">
            <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
          <button type="button" class="btn btn_child"
            onclick="location.reload();">Giới Thiệu</button>
        </div>
      </div>
      <h4 style="margin-top: 20px; margin-bottom: 10px;">Giới Thiệu</h4>
      <p>Hoa là món quà vô giá mà thiên nhiên đã dành tặng cho con người. Mỗi loài hoa mang một vẻ đẹp và sắc thái riêng, chính vì vậy mà người thưởng thức hoa có thể gởi gắm tâm tư tình cảm của mình vào giỏ hoa một cách tinh tế, ý nghĩa.</p>
      <p>Bên cạnh đó, mỗi loài hoa còn mang một ý nghĩa đặc biệt, hiểu được nó sẽ giúp bạn tránh khỏi những bối rối không nói nên lời trước một tình yêu e ấp, trước một tình bạn bền lâu, một lòng biết ơn vô bờ bến đối với cha với mẹ, hay chỉ đơn giản là một lời cảm ơn sâu sắc, chân thành…</p>
      <p>Đến với Shophoatuoitravinh.com các bạn sẽ được nhìn ngắm đầy đủ các loại hoa và kiểu hoa được kết khéo léo hoàn toàn mới nhưng vẫn toát lên vẻ đẹp tự nhiên vốn có của mỗi loài hoa. Từ những nguyên liệu cơ bản kết hợp với sự khéo léo của đôi bàn tay người thợ, Shophoatuoitravinh.com đã thổi vào đó một hồn hoa tinh tế với màu sắc thật tự nhiên, mềm mại. Bên cạnh vẻ đẹp tươi tắn, sinh động đó, mỗi giỏ hoa còn có độ tươi bền lâu, góp phần tăng thêm giá trị vẻ đẹp.</p>
      <p>Với những ưu điểm nổi bật trên, Shophoatuoitravinh.com mong muốn đem đến cho quý khách những sản phẩm hoa thân thiện, gần gũi, góp phần trang trí cho không gian sống của gia đình bạn thêm sinh động, mới mẻ. Bên cạnh đó, giá cả hợp lí phải chăng sẽ giúp quý khách có được sự lựa chọn tốt nhất cho sản phẩm mình yêu thích.</p>
      <p>Ngoài ra, chúng tôi chuyên nhận đặt hoa cho các chương trình sự kiện lớn như: hội thảo, cưới hỏi… vv…</p>
      <p>Đến với Shophoatuoitravinh.com, là đến với những mẫu hoa độc đáo, luôn được trang trí ấn tượng, sang trọng, mang tính nghệ thuật truyền cảm hứng cao tới người được nhận.</p>
      <p>Chúng tôi luôn sẵn sàng phục vụ Quý khách, với sự tận tình chu đáo, bằng nhiều sản phẩm và dịch vụ đa dạng, chuyển hoa miễn phí trong các dịp lễ tết, một cách nhanh chóng nhất.</p>
      <p>Thông điệp mà chúng tôi muốn gửi tới khách hàng là chúc Quý vị luôn vui vẻ, hạnh phúc và có cuộc sống thật tươi đẹp.</p>
      <p>Chúng tôi xin chân thành cảm ơn sự ủng hộ của Quý Vị.</p>
      <!--Het-->
    </div>
    <div class="col-1"></div>
  </div> 
  <!--Footer-->
  <?php
    include_once('footer.php');
  ?>
</div>

</body>
</html>