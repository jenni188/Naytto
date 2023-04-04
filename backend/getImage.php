<?php
//getting product images to fron and admin page

//check if logged in
session_start();

if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );
    header('Location: ../index.php');
    die();

}
//check if there is a product id
if (!isset($_GET['id'])){
    header('Location: ../about.php');
}

$productid = $_GET['id'];

//connection to database
include_once 'pdo-connect.php';

//get image data from database
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
    }else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<img src="'.$row['img'].'" />';
        
    }
}catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe!'
    );
    header("Content-type: application/json;charset=utf-8");
    echo json_encode($data);
    die();
}
