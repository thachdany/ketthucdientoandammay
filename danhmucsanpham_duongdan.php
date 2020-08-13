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
<?php
	//Lấy tên danh mục nếu đó
	if($madanhmuc==""){
	?>
	<div class="btn-group">
		<button type="button" class="btn btn_parent" onclick="window.open('index.php','_self');">
		  <img src="img/home_24px.png" width="20px"> Trang chủ &#10095;</button>
		<button type="button" class="btn btn_child"
		  onclick="location.reload();">Sản phẩm</button>
	</div>
	<?php
	}else{
		$sql="Select Tendanhmuc from danhmuc Where Madanhmuc='$madanhmuc'";
		$result = mysqli_query($conn, $sql); 
		$Tendanhmuc="";
		if($result==true && mysqli_num_rows($result)>0){
			$row = $result->fetch_assoc();
			$Tendanhmuc=$row['Tendanhmuc'];
			//Hiện thị
			?>
			<div class="btn-group">
				<button type="button" class="btn btn_parent" onclick="window.open('index.php','_self');">
				<img src="home_24px.png" width="20px"> Trang chủ &#10095;</button>
				<button type="button" class="btn btn_parent" onclick="window.open('danhsachmathang.php','_self');">Sản phẩm &#10095;</button>
				<button type="button" class="btn btn_child"
				  onclick="location.reload();"><?php echo $Tendanhmuc; ?></button>
			</div>
			<?php
		}
	}
?>