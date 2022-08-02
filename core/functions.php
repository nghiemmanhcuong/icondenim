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

function getTotalSales($date){
    global $conn;
    $date = explode("-",$date);
    $year = $date[0];
    $month = $date[1];

    $sql = "SELECT sum(total_price) as total_price FROM orders WHERE  year(created_at)=? AND month(created_at)=? AND status='Đã thanh toán'";
    $result = query($sql,[$year,$month])->fetch(PDO::FETCH_ASSOC);
    return $result['total_price'];
}

function getTotalSalesDay($date){
    global $conn;
    $date = explode("-",$date);
    $year = $date[0];
    $month = $date[1];
    $day = $date[2];

    $sql = "SELECT sum(total_price) as total_price FROM orders WHERE  year(created_at)=? AND month(created_at)=? AND day(created_at)=? AND status='Đã thanh toán'";
    $result = query($sql,[$year,$month,$day])->fetch(PDO::FETCH_ASSOC);
    return $result['total_price'];

function getSlugUrl() {
    if(isset($_SERVER['PATH_INFO'])){
        $url_arr = explode("/", $_SERVER['PATH_INFO']);
        $url_arr = array_filter($url_arr);
        $url_arr = array_values($url_arr);
        
        if(isset($url_arr[1])) {
           return $url_arr[1];
        }
    }

    return null;
}

function handleImportClient($view=null, $model=null,$web_title=''){
    require_once('../core/variables.php');
    $slug = getSlugUrl();
    if(!empty($model)){
        require_once('models/'.$model);
    }
    include_once('views/block/header.php');
    include_once('views/block/fixed.php');
    include_once('views/block/topbar.php');
    include_once('views/block/navigation.php');
    if(!empty($view)){
        require_once('views/'.$view);
    }
    include_once('views/block/cart.php');
    include_once('views/block/footer.php');
}

function handleMenu($menu, $parent = 0, $is_sub = false){
    $sub_menu = [];
    $parent_id_arr = [];
    if(!empty($menu)){
        foreach ($menu as $key => $item) {
            $parent_id_arr[] = $item['parent_id'];
            if($parent == $item['parent_id']){
                $sub_menu[] = $item;
                unset($menu[$key]);
            }
        }
    }

    if(!empty($sub_menu)){
        echo ($is_sub) ? '<ul class="sub-dropdown">' : '<ul class="dropdown">';
        foreach ($sub_menu as $item) {
            $icon = (in_array($item['id'],$parent_id_arr)) ? '<i class="fa-solid fa-angle-right"></i>' :'';
            echo '<li class="dropdown-item">';
            echo '<a href="'.WEB_ROOT.'/collections/'.$item['slug'].'" class="dropdown-link">'.$item['name'].$icon.'</a>';
            handleMenu($menu,$item['id'],$is_sub=true);
            echo '</li>';
        }
        echo '</ul>';
    }

function getProductImages($product_id) {
    global $conn;
    $sql = "SELECT * FROM product_images WHERE product_id=?";
    $product_images = query($sql,[$product_id])->fetchall(PDO::FETCH_ASSOC);
    return $product_images;
}

function getStarsNum($product_reviews) {
    $one_star = 0;
    $two_star = 0;
    $three_star = 0;
    $four_star = 0;
    $five_star = 0;
    $total_star = 0;

    foreach ($product_reviews as $review) {
        if($review['stars'] == 1){
            $one_star++;
        }

        if($review['stars'] == 2){
            $two_star++;
        }

        if($review['stars'] == 3){
            $three_star++;
        }

        if($review['stars'] == 4){
            $four_star++;
        }

        if($review['stars'] == 5){
            $five_star++;
        }

        $total_star += $review['stars'];
    }

    if(count($product_reviews) > 0){
        $point = $total_star / count($product_reviews);
        $point = round($point,1,PHP_ROUND_HALF_UP);
    }else {
        $point = 0;
    }
    
    return [
        'one_star'=>$one_star,
        'two_star'=>$two_star,
        'three_star'=>$three_star,
        'four_star'=>$four_star,
        'five_star'=>$five_star,
        'total_star'=>$total_star,
        'point'=>$point,
    ];
}

function getevaluate($product_id) {
    global $conn;
    $sql = "SELECT stars FROM product_reviews WHERE product_id=?";
    $stars = query($sql,[$product_id])->fetchAll(PDO::FETCH_ASSOC);

    $point = getStarsNum($stars);

    return [
        'point'=>$point['point'],
        'evaluate'=>count($stars),
    ];
}

function getWarehouse($product_id){
    global $conn;
    $colors = array();
    $color_id = array();
    $sizes = array();
    $size_id = array();

    $sql = "SELECT color,size FROM product_warehouse WHERE product_id=?";
    $warehouse = query($sql,[$product_id]);

    foreach ($warehouse as $item) {
        $color_id[] = $item['color'];
        $size_id[] = $item['size'];
    }

    $color_id = array_unique($color_id);
    $size_id = array_unique($size_id);

    foreach ($color_id as $id) {
        $sql = "SELECT * FROM colors WHERE id=?";
        $color = query($sql,[$id])->fetch(PDO::FETCH_ASSOC);
        array_push($colors, $color);
    }

    foreach ($size_id as $id) {
        $sql = "SELECT * FROM sizes WHERE id=?";
        $size = query($sql,[$id])->fetch(PDO::FETCH_ASSOC);
        array_push($sizes, $size);
    }

    return [
        'color' => $colors,
        'size' => $sizes,
    ];
}
}

}

function getSqlFilterSizeColor($size_id=null,$color_id=null){

    if(isset($color_id) && isset($size_id)){
        $sql_filter = "SELECT product_id FROM product_warehouse WHERE color=$color_id AND size=$size_id";
    }else if(isset($color_id)) {
        $sql_filter = "SELECT product_id FROM product_warehouse WHERE color=$color_id";
    }else if(isset($size_id)) {
        $sql_filter = "SELECT product_id FROM product_warehouse WHERE size=$size_id";
    }

    return $sql_filter;
} 

function getAcountType($account_type){
    if($account_type == 'regular'){
        return 'Thường <i class="fa-solid fa-user"></i>';
    }else if($account_type == 'silver'){
        return 'Bạc <i class="fa-solid fa-user-shield"></i> (Đặc quyền ưu đãi giảm 5% khi mua hành nguyên giá) ';
    }else if($account_type == 'gold'){
        return 'Khách hàng thân thiết <i class="fa-solid fa-crown" style="color:orange"></i> (Đặc quyền ưu đãi giảm 10% khi mua hành nguyên giá)';
    }
}