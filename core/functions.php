<?php
function redirect($path){
    return header('Location:'. $path);
}

function validateInput($input){
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = strip_tags($input);
    
    return $input;
}

function validateUser(){
    if(!$_COOKIE['user_admin_id']) {
        redirect('index.php');
    }else {
        global $conn;
        $user_id = $_COOKIE['user_admin_id'];
        $sql = "SELECT id,name,email,access,avatar,address,phone,password FROM users WHERE id=?";
        $user = query($sql,[$user_id])->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
    }
}

function query($sql, $params=[]){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    
    return $stmt;
}

function handleImportServer($view=null,$model=null,$web_title=null) {
    validateUser();
    require_once('../core/variables.php');
    if(!empty($model)){
        require_once('models/'.$model);
    }
    include_once('views/block/header.php');
    include_once('views/block/sitebar.php');
    if(!empty($view)){
        include_once('views/'.$view);
    }
    include_once('views/block/footer.php');
}

function handleUpload($file) {
    $file_name = $file['name'];
    $max_size = 10;
    $ext_arr = ['png','jpg','jpeg','webp'];

    $error = '';
    $file_size = $file['size']/1024/1024;
    $ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    $new_file = md5(uniqid()).'.'.$ext;
    
    if(in_array($ext,$ext_arr)){
        if($file_size <= $max_size){
            $upload = move_uploaded_file($file['tmp_name'],'../uploads/'.$new_file);
            if(!$upload){
                $error = 'Tải ảnh không thành công';
            }
        }else {
            $error = 'File vượt quá dung lượng';
        }
    }else {
        $error = 'File không hợp lệ';
    }
    
    return [
        'file'=>$new_file,
        'error'=>$error
    ];
}

function handleUploadMultiple($files) {
    $file_name_arr = $files['name'];
    $max_size = 10;
    $ext_arr = ['png','jpg','jpeg','webp'];

    $errors = [];
    $new_file_arr = [];

    if(!empty($file_name_arr)){
        foreach ($file_name_arr as $key=>$item) {
            $size = $files['size'][$key]/1024/1024;
            $ext = strtolower(pathinfo($item,PATHINFO_EXTENSION));
            $new_file = md5(uniqid()).'.'.$ext;
            
            if(in_array($ext,$ext_arr)){

                if($size <= $max_size){
                    $upload = move_uploaded_file($files['tmp_name'][$key],'../uploads/'.$new_file);
                    $new_file_arr[] = $new_file;
                }else {
                    $errors[] = 'File '.($key + 1).' vượt quá dung lượng ';
                }
            }else {
                $errors[] = 'File '.($key + 1).' không hợp lệ';
            }
        }
    }

    return [
        'errors' => $errors,
        'files' => $new_file_arr
    ];
}

function handleAccess($access){
    if(isset($access)){
        if($access == 'user'){
            return 'Người dùng';
        }else if ($access == 'saff'){
            return 'Nhân viên';
        }else if($access == 'admin'){
            return 'Quản trị viên';
        }
    }else {
        return '';
    }
}

function handleNameUser($name){
    $name_arr = explode(' ',$name);
    $new_name = end($name_arr);
    return $new_name;
}

function handleCategoryGroup($category_id){
    global $conn;
    $sql = "SELECT name FROM categories WHERE id=?";
    $category = query($sql,[$category_id])->fetch(PDO::FETCH_ASSOC);
    $category_name = $category['name'];
    return $category_name;
}

function toSlug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}

function handlePrice($price){
    $price = number_format($price,0,',','.');
    $price = $price.'<sup>đ</sup>';
    return $price;
}

function handleDateTime($dateTime,$format = false){
    $dateTime = strtotime($dateTime);
    if(!$format){
        $dateTime = strftime('%d/%m/%Y',$dateTime);
    }else {
        $dateTime = strftime('%H:%M %d/%m/%Y',$dateTime);
    }
    return $dateTime;
}