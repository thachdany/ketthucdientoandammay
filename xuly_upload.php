<?php
    //Tải ảnh
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //Kiểm tra có hình hay không?
        if($check == false) {
            //Không có ảnh
            //echo "File is not an image.";
            //Cập nhật cái còn lại
            include_once('xuly_mathang.php');         
        } else {
            //Có ảnh
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            //các biến tùm lum
            $target_dir = "hinhhoa/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            /*
            // Check if file already exists
            if (file_exists($target_file)) {
               echo "<script>alert('Tệp ảnh đã tồn tại!');</script>";
                $uploadOk = 0;
            }
            */
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "<script>alert('Kích thước ảnh quá lớn (tối đa chỉ 5MB)!');</script>";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                echo "<script>alert('Chỉ hỗ trợ file JPG, JPEG, PNG & GIF!');</script>";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                //echo "Sorry, your file was not uploaded.";
                //include_once('xuly_mathang.php');
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    //Kiem tra tac vu
                    include_once('xuly_mathang.php');
                    //echo "Đã tải hình";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                    //echo "Không thể tải ảnh lên!";           
                }
            }
        }
    }   
?>