<?php
//getting the product to be edited

// check if logged in 
session_start();
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );
    header("Content-type: application/json;charset=utf-8");
    echo json_encode($data);
    die();
}

//check if there is a product id
if (!isset($_GET['id'])){
    header('Location: ../homeAdmin.php');
}

//prepare variable
$productid = $_GET['id'];

//connection to database
include_once 'pdo-connect.php';

// get product data from database
try{
    $stmt = $conn->prepare("SELECT id, category, name, code, price FROM product WHERE  id = :productid");

    $stmt->bindParam(':productid', $productid);

    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
    }else {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $result;
    }
}catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe'
   );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);