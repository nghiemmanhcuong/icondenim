<?php
    $sql = "SELECT * FROM shop_info";
    $shop_info = query($sql)->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    }
