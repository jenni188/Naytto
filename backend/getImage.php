<?php
ob_start();

//check if logged in
session_start();

if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = false;
}

//connection to database
include_once 'pdo-connect.php';

//get image data from database
$productid = $_GET['id'];

try{
    $stmt = $conn->prepare("SELECT img FROM product WHERE id = :productid");
    $stmt->bindParam(':productid', $productid);
    
    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
        header("Content-type: application/json;charset=utf-8");
        echo json_encode($data);
        die();
    } else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $imageData = $row['img'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $contentType = finfo_buffer($finfo, $imageData);
        ob_end_clean();
        header("Content-Type: " . $contentType);
        echo $imageData;     
    }
}catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe!'
    );
    header("Content-type: application/json;charset=utf-8");
    echo json_encode($data);
    die();
}
