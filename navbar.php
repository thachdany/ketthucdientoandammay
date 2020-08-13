<style type="text/css">
      .navbar_nav {
        background: #666666;
        /*padding-top: 10px;*/
      }
      .navbar_li_a {
        color: white;
        text-decoration: none;
        width: 100px;
        text-align: center;  
        font-weight: bold;      
      }
      /* Change the link color on hover */
      .navbar_li_a:hover {
        background-color: #333333;
        color: white;
      }
  
</style>
<nav class="navbar navbar-expand navbar_nav sticky-top" >
    <!-- Lề trái -->
    <ul class="navbar-nav">
      <!---->
      <li class="nav-item">
        <a class="nav-link navbar_li_a" href="index.php">Trang chủ</a>
      </li>
      <!---->
      <li class="nav-item">
        <a class="nav-link navbar_li_a" href="gioithieu.php">Giới thiệu</a>
      </li>
      <!---->
      <li class="nav-item">
        <a class="nav-link navbar_li_a" href="danhsachmathang.php">Sản phẩm</a>
      </li>
      <!---->
      <li class="nav-item">
        <a class="nav-link navbar_li_a" href="lienhe.php">Liên hệ</a>
      </li>
      <!---->
      <li class="nav-item">
        <!--Hiện thị Button Quản trị hệ thống-->
        <style type="text/css">
          .btn_quantrihethong:hover{
              background-color: #4CAF50;
              color: white;
          }
          .btn_quantrihethong:hover{
            background-color: white;
            color: black;
          }</style>
        <script type="text/javascript">
          function OpenQuanly(){
            window.open('danhmuc_danhsach.php','_self');
          }
        </script>
        <?php
          if($quyen==2){
            echo '<button class="btn btn-outline-light btn_quantrihethong" onclick="OpenQuanly();">Quản trị hệ thống</button>';
          }
        ?>       
      </li>
      <!---->
    </ul>
    <!-- Lề phải -->
    <ul class="navbar-nav ml-auto">
      <form class="form-inline input-group" name="frmTimkiem" method="post" action="timkiem.php">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Tìm kiếm" name="txtTimkiem">
          <button type="submit" class="btn btn-success" style="margin-left: -5px; padding-left: 20px; padding-right: 20px;">Tìm</button>       
        </div>
      </form>
    </ul></nav>