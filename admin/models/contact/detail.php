<?php

if(!empty($_GET['contact_id'])){
    $contact_id = $_GET['contact_id'];
}else {
    redirect('?p=lien-he');
}

if(isset($contact_id)){
    $sql = "SELECT * FROM contacts WHERE id=?";
    $contact = query($sql,[$contact_id])->fetch(PDO::FETCH_ASSOC);
}