<?php
    $sql = 'SELECT name,slug FROM categories';
    $categories = query($sql)->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM slides WHERE id = $id";
        $slide = query($sql)->fetch(PDO::FETCH_ASSOC);
    }

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
            $image = $_POST['img'];
        }
        
        if(empty($errors)) {
            $sql = "UPDATE slides SET width=?, height=?, link=?, status=?, image=? WHERE id=?";
            $result = query($sql,[
                $width,
                $height,
                $link,
                $status,
                $image,
                $id
            ]);
            redirect('index.php?p=show-slides&msg=Sửa slide thành công');
        // die;
        }
    }
 ?>