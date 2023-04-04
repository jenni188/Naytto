<?php
//deleting a product

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
    header('Location: ../index.php');
}

//prepare variable
$productid = $_GET['id'];

//connection to database
include_once 'pdo-connect.php';

//delete product data from database
try{
    $stmt = $conn->prepare("DELETE FROM product WHERE id = :productid ");
    $stmt->bindParam(':productid', $productid);

    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
    }else {
        $data = array(
            'success'=> 'Product removed!'
        );
    }

} catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe'
   );
}header("Content-type: application/json;charset=utf-8");
echo json_encode($data);