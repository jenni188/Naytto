<?php

if (!isset($_GET['id'])){
    header('Location: ../index.php');
}


$productid = $_GET['id'];

include_once 'pdo-connect.php';

try{
    $stmt = $conn->prepare("SELECT id, category, name, img, code, price FROM product WHERE  id = :productid");

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