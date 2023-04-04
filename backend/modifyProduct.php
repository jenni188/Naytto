<?php
//to modify product data

session_start();

//check if logged in
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );
    header('Location: ../index.php');
    die();

}

//check if there is a product id
if (!isset($_GET['id'])){
    header('Location: ../homeAdmin.php');
}

//prepare variables
$json = file_get_contents('php://input');
$productData = json_decode($json);
$data = array();

//connection to  database
include_once 'pdo-connect.php';

//updating data to products in database
try{
    $stmt = $conn->prepare("UPDATE product SET category = :category, name = :name, code = :code, price = :price WHERE id = :id");
    $stmt->bindParam(":category", $productData->category);
    $stmt->bindParam(":name", $productData->name);
    $stmt->bindParam(":code", $productData->code);
    $stmt->bindParam(":price", $productData->price);
    $stmt->bindParam(":id", $productData->id);

    
    if($stmt->execute() == false){
        $data['error'] = 'Error modifying product';
    } else{
        $data['success'] = 'Product edit success';
    }
}catch (PDOException $e){
    $data['error'] = $e->getMessage();
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);