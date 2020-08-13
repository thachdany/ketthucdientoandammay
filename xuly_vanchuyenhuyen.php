<?php
	//Kiem tra tac vu
	if(isset($_GET["tacvu"])){
		$tacvu=$_GET["tacvu"];
		//Kết nối CSDL
		include_once("csdl/connect.php");
		//Them, sua
		if(isset($_POST["txtTenhuyen"])
			&&isset($_POST["txtPhivanchuyen"])){
			$txtTenhuyen=$_POST["txtTenhuyen"];	
			$txtPhivanchuyen=$_POST["txtPhivanchuyen"];
			//Them
			if($tacvu=="them"){
				$sql="INSERT INTO Vanchuyen_Huyen(Tenhuyen, PhiVanChuyen) VALUES ('$txtTenhuyen','$txtPhivanchuyen')";
			}else{
				$Mahuyen=$_GET["id"];
				$sql="UPDATE Vanchuyen_Huyen SET Tenhuyen='$txtTenhuyen',PhiVanChuyen='$txtPhivanchuyen' WHERE Mahuyen=$Mahuyen";
			}		
		}else if($tacvu=="xoa"){
			$Mahuyen=$_GET["id"];
			$sql="DELETE FROM Vanchuyen_Huyen WHERE Mahuyen=$Mahuyen";
		}
		//Kết quả
		if ($conn->query($sql) === TRUE) {
		    //echo "New record created successfully";
		    header("Location: vanchuyenhuyen_danhsach.php");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		$conn->close();
	}
?>