<?php

if(!isset($slug)){
    $slug = 'all';
}

// sort
if(!empty($_GET['sort_by'])){
    $sort_array = explode('-', $_GET['sort_by']);
    $field = $sort_array[0];
    if(isset($sort_array[1])){
        $sort = $sort_array[1];
    }else {
        header('Location:'.WEB_ROOT.'/collections/all');
    }
}

// get sizes
$sql = "SELECT * FROM sizes";
$sizes = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// get colors
$sql = "SELECT * FROM colors";
$colors = query($sql)->fetchAll(PDO::FETCH_ASSOC);

// pagination
$limit = 16;
$curr_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($curr_page - 1) * $limit;

// filter color and size
if(isset($_GET['size']) || isset($_GET['color'])) {
    if(isset($_GET['color']) && isset($_GET['size'])){
        $sql_filter = getSqlFilterSizeColor($_GET['size'], $_GET['color']);
    }else if(isset($_GET['color'])) {
        $sql_filter = getSqlFilterSizeColor(null,$_GET['color']);
    }else if(isset($_GET['size'])) {
        $sql_filter = getSqlFilterSizeColor($_GET['size']);
    }   
}

// Lấy ra Tất cả sản phẩm
if($slug == 'all') {
    if(isset($field) && isset($sort)){
        $sql = "SELECT * FROM products ORDER BY $field $sort LIMIT $limit OFFSET $offset";
    }else {
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT $limit OFFSET $offset";
        if(isset($sql_filter)){
            $sql = "SELECT * FROM products WHERE id IN ($sql_filter) LIMIT $limit OFFSET $offset";
        }
    }
    $products = query($sql)->fetchAll(PDO::FETCH_ASSOC);

    if(isset($sql_filter)){
        $product_count = query("SELECT * FROM products WHERE id IN ($sql_filter)")->rowCount();
    }else {
        $product_count = query("SELECT * FROM products")->rowCount();
    }

    $title_category = 'Tất cả sản phẩm';
    $web_title = 'Tất cả sản phẩm';

// Lấy ra Sản phẩm mới
}else if($slug == 'san-pham-moi'){
    $is_new = true;

    if(isset($field) && isset($sort)){
        $sql = "SELECT * FROM products WHERE is_new=? ORDER BY $field $sort LIMIT $limit OFFSET $offset";
    }else {
        $sql = "SELECT * FROM products WHERE is_new=? LIMIT $limit OFFSET $offset";
        if(isset($sql_filter)){
            $sql = "SELECT * FROM products WHERE is_new=? AND id IN ($sql_filter) LIMIT $limit OFFSET $offset";
        }
    }
    $products = query($sql,[1])->fetchAll(PDO::FETCH_ASSOC);

    if(isset($sql_filter)){
        $product_count = query("SELECT * FROM products WHERE is_new=1 AND id IN ($sql_filter)")->rowCount();
    }else {
        $product_count = query("SELECT * FROM products WHERE is_new=1")->rowCount();
    }

    $title_category = 'Sản phẩm mới';
    $web_title = 'Sản phẩm mới';

// Lấy ra sản phẩm theo category
}else {
    $sql = "SELECT * FROM categories WHERE slug=?";
    $stmt = query($sql,[$slug]);

    // Nếu không tìm thấy category nào lấy ra các sản phẩm bán chạy nhất
    if($stmt->rowCount() > 0) {
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $category_id = $category['id'];

        
        if(isset($field) && isset($sort)){
            $sql = "SELECT * FROM products WHERE category_id=? ORDER BY $field $sort LIMIT $limit OFFSET $offset";
        }else {
            $sql = "SELECT * FROM products WHERE category_id=? LIMIT $limit OFFSET $offset";
            if(isset($sql_filter)){
                $sql = "SELECT * FROM products WHERE category_id=? AND id IN ($sql_filter) LIMIT $limit OFFSET $offset";
            }
        }
        $stmt = query($sql,[$category_id]);

        // Nếu không có sản phẩm nào lấy ra các sản phẩm bán chạy nhất
        if($stmt->rowCount() == 0) {
            $sql = "SELECT * FROM products ORDER BY sold DESC LIMIT 12";
            $selling_product = query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(isset($sql_filter)){
            $product_count = query("SELECT * FROM products WHERE category_id=$category_id AND id IN ($sql_filter)")->rowCount();
        }else {
            $product_count = query("SELECT * FROM products WHERE category_id=$category_id")->rowCount();
        }

        // nếu category ở cấp cha lấy ra tất cả các category con
        if($category['parent_id'] == 0) {
            $sql_string = '';
            $products = array();
            $sql = "SELECT id FROM categories WHERE parent_id=$category_id";
            $result = query($sql)->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $value) {
                $sql_string .= " OR category_id=".$value['id'];
            }

            if(isset($field) && isset($sort)){
                $sql = "SELECT * FROM products WHERE category_id=?".$sql_string." ORDER BY $field $sort LIMIT $limit OFFSET $offset";
            }else {
                $sql = "SELECT * FROM products WHERE category_id=?".$sql_string." LIMIT $limit OFFSET $offset";

                if(isset($sql_filter)){
                    $sql = "SELECT * FROM products WHERE (category_id=? $sql_string) AND id IN ($sql_filter) LIMIT $limit OFFSET $offset";
                }
            }

            $products = query($sql,[$category_id])->fetchAll(PDO::FETCH_ASSOC);

            if(isset($sql_filter)){
                $count_sql =  "SELECT * FROM products WHERE (category_id=? $sql_string) AND id IN ($sql_filter)";
                $product_count = query($count_sql,[$category_id])->rowCount();
            }else {
                $count_sql =  "SELECT * FROM products WHERE category_id=? $sql_string";
                $product_count = query($count_sql,[$category_id])->rowCount();
            }
        }

        $title_category = $category['name'];
        $web_title = $category['name'];
        
    }else {
        $sql = "SELECT * FROM products ORDER BY sold DESC LIMIT 12";
        $selling_product = query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $product_count = 0;
    }
}


if(empty($products)) {
    $title = 'Không tìm thấy sản phẩm nào phù hợp';
}

// display total product in view
$total_product = $product_count;
if($total_product < $limit) {
    $product_display = $total_product;
}else {
    $product_display = $limit;
}

// count pages
if(isset($products)) {
    $pages = ceil($product_count / $limit);
}