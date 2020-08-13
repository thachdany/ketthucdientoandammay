<div style="background-color: #666666; height: 40px;" class="form-inline">
    <!--Điện thoại và email-->
    <div class="form-inline" style="height: 40px;">
       <!--SDT-->
      <img src="img/phone.png" width="18px" style="margin-left: 20px;">
      <label style="color: white; margin-left: 5px;">Điện thoại: 0836411131</label>
      <!--Email-->
      <img src="img/mail.png" width="18px" style="margin-left: 30px;">
      <label style="color: white; margin-left: 5px;">Email: thachdany@gmail.com</label>
    </div>
    <!--Hiện thị tài khoản-->
    <div class="form-inline ml-auto" style="margin-right: 20px;">
      <img src="img/account.png" width="18px" style="margin-left: 20px;">
      <style type="text/css">
        .taikhoan{
          color: white;
          margin-left: 10px;
          font-weight: bold;
        }
        .taikhoan:hover{
          /*Không gạch chận*/
          text-decoration: none;
          /*Màu*/
          color: #666666;
        }
      </style>
     <!---Chưa đăng nhập-->
     
     
      <a href="user_dangnhap.php" class="taikhoan" id="taikhoan_chuadangnhap" >Đăng nhập-đăng ký</a>
      <!--Đã đăng nhập-->
      <table id="taikhoan_dadangnhap">
        <tr style="line-height:10px;">
          <td style="padding-left: 10px; color: white; font-size: 12px;">Xin chào:</td>
        </tr>
        <tr style="line-height:20px;">
          <td><a href="quanlytaikhoan_thongtin.php" class="taikhoan" id="txtDangnhap_ten"><?php echo $tenuser; ?></a></td>
        </tr>
      </table>
      <?php
        if($tenuser==""){
          //Chưa đăng nhập
          echo "<script>document.getElementById('taikhoan_chuadangnhap').style.display='block';document.getElementById('taikhoan_dadangnhap').style.display='none';</script>";
        }else{
          //Đã đăng nhập
           echo "<script>document.getElementById('taikhoan_chuadangnhap').style.display='none';document.getElementById('taikhoan_dadangnhap').style.display='block';</script>";
        }
      ?>
    </div></div>