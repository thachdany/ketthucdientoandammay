<?php
	//Kiem tra tac vu
	if(isset($_GET["tacvu"])){
		$tacvu=$_GET["tacvu"];
		//Kết nối CSDL
		include_once("csdl/connect.php");
		//Them, sua
		if(isset($_POST["txtHotenlot"])
			&&isset($_POST["txtTen"])
			&&isset($_POST["txtEmail"])
			&&isset($_POST["txtSoDienThoai"])
			&&isset($_POST["sltMahuyen"])
			&&isset($_POST["txtDC_2"])
		){
			$txtHotenlot=$_POST["txtHotenlot"];			
			$txtTen=$_POST["txtTen"];
			$txtEmail=$_POST["txtEmail"];
			$txtSoDienThoai=$_POST["txtSoDienThoai"];
			$sltMahuyen=$_POST["sltMahuyen"];
			$txtDC_2=$_POST["txtDC_2"];
			//Them
			if($tacvu=="them" && isset($_POST["txtMatKhau"])){
				$txtMatKhau=$_POST["txtMatKhau"];
				$sql="INSERT INTO TaiKhoan (HoTenLot, Ten, Email, SoDienThoai, MatKhau, DC_Ap, DC_MaHuyen, Quyen)
				VALUES ('$txtHotenlot', '$txtTen', '$txtEmail', '$txtSoDienThoai', '".md5($txtMatKhau)."', '$txtDC_2', $sltMahuyen,1)";
			}else if($tacvu=="sua"){
				$mataikhoan=$_GET["id"];
				$sql="UPDATE TaiKhoan
				SET HoTenLot='$txtHotenlot', Ten='$txtTen', Email='$txtEmail', SoDienThoai='$txtSoDienThoai', DC_Ap='$txtDC_2', DC_MaHuyen='$sltMahuyen'
				WHERE MaTaiKhoan=$mataikhoan";
			}		
		}else if($tacvu=="xoa"){
			$mataikhoan=$_GET["id"];
			$sql="DELETE FROM TaiKhoan WHERE MaTaiKhoan=$mataikhoan";
		}
		//Kết quả
		if ($conn->query($sql) === TRUE) {
		    if($tacvu=="them"){
		    	//header("Location: user_dangkythanhcong.php");
		    	echo "<script>window.open('user_dangkythanhcong.php','_self');</script>";
		    }else if($tacvu=="sua"){
		    	echo "<script>window.open('quanlytaikhoan_thongtin.php','_self');</script>";
		    }else if($tacvu=="xoa"){
		    	header("Location: quanlytaikhoan_danhsach.php");
		    }
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		$conn->close();
	}
?>