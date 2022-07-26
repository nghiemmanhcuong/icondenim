<?php
if(!empty($_GET['contact_id'])){
    $contact_id = $_GET['contact_id'];
    $sql = "SELECT user_email FROM contacts WHERE id=?";
    $contact = query($sql,[$contact_id])->fetch(PDO::FETCH_ASSOC);
    $user_email = $contact['user_email'];
}else {
    redirect('?p=lien-he');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();

    $title = validateInput($_POST['title']);
    $content = validateInput($_POST['content']);

    if(empty($title)){
        $errors['title'] = 'Nhập tiêu đề mail';
    }

    if(empty($content)){
        $errors['content'] = 'Nhập nội dung mail';
    }

    if(empty($errors)){
        $email = $user_email;
        require_once('core/email/sendmail.php');
        redirect('?p=lien-he&msg=Gửi trả lời thành công');
    }
}