<style type="text/css">
  .danhsach_div{
    background-color: #333333;
    text-align: center;
    border-radius: 10px 10px 0 0;
    padding-top: 10px;
    padding-bottom: 5px;
  }
  .danhsach_items:hover{
    color: #df0054;
    background-color: #fdffdc;
  }
</style>
<div class="danhsach_div">
  <label style="color: white; font-weight: bold;">DANH MỤC SẢN PHẨM</label>
</div>
<ul class="list-group" style="border: 1px solid #e2598b">
  <style type="text/css">
    label.danhmuc_quanly{
      font-weight: bold;
      margin-left: 10px;
    }
  </style>    
  <?php
    $sql="SELECT* FROM Danhmuc";
    $result=$conn->query($sql);
    //Kiểm tra tồn tại
    if($result->num_rows>0){
      //Chèn các dòng
      while($row = $result->fetch_assoc()) {
        ?>
        <a class="list-group-item list-group-item-action danhsach_items"
        href="danhsachmathang.php"=<?php echo $row['Madanhmuc'];?>">
          <div class="form-inline">
            <img class="danhsach_img" src="img/home_danhmuc.png" width="20px">
            <label class="danhmuc_quanly"><?php echo $row['Tendanhmuc'];?></label>
          </div>
        </a>    
        <?php
      }
    }
  ?>      
</ul>