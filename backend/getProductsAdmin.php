<?php
//getting products to admin front page

session_start();

//check if logged in
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );
    header('Location: ../index.php');
    die();
}

//connection to database
include_once 'pdo-connect.php';

//get product data from database
try{
    $stmt = $conn->prepare("SELECT id, category, name, img, code, price FROM product");
    

    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
    }else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = $result;
    }
}catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe!'
   );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);