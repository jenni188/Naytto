<?php
//getting the product to be edited

//check if there is a text id
if (!isset($_GET['id'])){
    header('Location: ../index.php');
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