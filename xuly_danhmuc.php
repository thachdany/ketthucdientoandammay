<?php
	//Kiem tra tac vu
	if(isset($_GET["tacvu"])){
		$tacvu=$_GET["tacvu"];
		//Kết nối CSDL
		include_once("csdl/connect.php");
		//Them, sua
		if(isset($_POST["txtTendanhmuc"])){
			$txtTendanhmuc=$_POST["txtTendanhmuc"];			
			//Them
			if($tacvu=="them"){
				$sql="INSERT INTO Danhmuc(Tendanhmuc) VALUES ('$txtTendanhmuc')";
			}else{
				$madanhmuc=$_GET["id"];
				$sql="UPDATE Danhmuc SET Tendanhmuc='$txtTendanhmuc' WHERE Madanhmuc=$madanhmuc";
			}		
		}else if($tacvu=="xoa"){
			$madanhmuc=$_GET["id"];
			$sql="DELETE FROM Danhmuc WHERE Madanhmuc=$madanhmuc";
		}
		//Kết quả
		if ($conn->query($sql) === TRUE) {
		    //echo "New record created successfully";
		    header("Location:danhmuc_danhsach.php");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}	
		$conn->close();
	}
?>