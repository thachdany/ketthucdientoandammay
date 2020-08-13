<?php
  //Kiem tra tac vu
  if(isset($_GET["tacvu"])){
    $tacvu=$_GET["tacvu"];
    //Kết nối CSDL
    include_once("csdl/connect.php");
    echo "Tác vụ: ".$tacvu;
    $sql="trống";
    //Them, sua
    if(isset($_POST["txtTenmathang"])
      &&isset($_POST["sltDanhmuc"])
      &&isset($_POST["txtGiaban"])
      &&isset($_POST["txtMota"])){

      $txtTenmathang=$_POST["txtTenmathang"];
      $sltDanhmuc=$_POST["sltDanhmuc"];
      $txtGiaban=$_POST["txtGiaban"];
      //$fileToUpload=$_POST["fileToUpload"];
      $txtMota=$_POST["txtMota"];
      echo "Vào tác vụ.";
      //Them
      if($tacvu=="them"){
        $sql="INSERT INTO mathang(TenHang, Madanhmuc, GiaBan, Mota, LinkAnh)
        VALUES ('$txtTenmathang','$sltDanhmuc','$txtGiaban','$txtMota','$target_file')";
      }else if($tacvu=="sua"){
        $MaHang=$_GET["id"];
        //Nếu có hình
        if($target_file!=""){
          $sql="UPDATE mathang
          SET TenHang='$txtTenmathang', Madanhmuc='$sltDanhmuc', GiaBan='$txtGiaban', Mota='$txtMota', LinkAnh='$target_file'
          WHERE MaHang='$MaHang'";
        }else{
          //Không có hình
          $sql="UPDATE mathang
          SET TenHang='$txtTenmathang', Madanhmuc='$sltDanhmuc', GiaBan='$txtGiaban', Mota='$txtMota'
          WHERE MaHang='$MaHang'";
        }
        //
        echo "Sửa: ".$sql;
      } 
    }else if($tacvu=="xoa"){
       $MaHang=$_GET["id"];
      $sql="DELETE FROM mathang WHERE MaHang=$MaHang";
    }
    //Kết quả
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        header("Location: mathang_danhsach.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    $conn->close();
  }
?>