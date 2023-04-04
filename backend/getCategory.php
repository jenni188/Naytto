<?php
//getting categories so products can be filtered

//check if logged in
session_start();

if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );
    header('Location: ../index.php');
    die();

}

//connection to database
include_once 'pdo-connect.php';

//get categories from database
try{
    $stmt = $conn->prepare("SELECT DISTINCT category FROM product");
    

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