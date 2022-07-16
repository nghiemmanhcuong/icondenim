<?php
$host = 'localhost';
$dbname = 'icon_denim';
$username = 'root';
$password = '';
    
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8",$username,$password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
// define("DB_HOST", "sql100.byethost3.com");
// define("DB_USER", "b3_31603570");
// define("DB_PASSWORD", "0987954221");
// define("DB_DATABASE", "b3_31603570_icon_denim");
    
// try {
//     $conn = new PDO("mysql:host=".DB_HOST."; dbname=".DB_DATABASE."; charset=utf8",DB_USER,DB_PASSWORD);
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }