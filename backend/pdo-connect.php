<?php
//connection to database
include_once('../env.php');
$servername = DB_HOST;
$db_username = DB_USER;
$db_password = DB_PASSWD;
$dbname = DATABASE;


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}