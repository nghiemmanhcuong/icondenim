<?php
    $sql = 'SELECT name,slug FROM categories';
    $categories = query($sql)->fetchAll(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();

        $width = validateInput($_POST['width']);
        $height = validateInput($_POST['height']);
        $link = validateInput($_POST['link']);

        if(empty($width)) {
            $errors['width']= 'Không được để trống';
        }elseif(!is_numeric($width) || $width <= 0) {
            $errors['width']= 'Phải nhập số và phải lớn hơn 0';
        }

        if(empty($height)) {
            $errors['height']= 'Không được để trống';
        }elseif(!is_numeric($height) && $height <= 0) {
            $errors['height']= 'Phải nhập số và phải lớn hơn 0';
        }

        if($_POST['status']){
            $status = 1;
        }

        if(empty($link)) {
            $errors['link'] = 'Không được để trống';
        }
        
        if($_FILES['image']['size'] > 0) {
            $result = handleUpload($_FILES['image']);
            if(!empty($result['error'])){
                $errors['image'] = $result['error'];
            }else {
                $image = $result['file'];
            }
        }else {
            $errors['image'] = 'Vui lòng chọn ảnh';
        }
        
        if(empty($errors)) {
            $sql = "INSERT INTO slides (width, height, link, status, image) VALUES (?,?,?,?,?)";
            $result = query($sql,[
                $width,
                $height,
                $link,
                $status,
                $image
            ]);
        header("Location: add.php?message=Thêm dữ liệu thành công");
        // die;
        }
    }
 ?>