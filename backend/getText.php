<?php
//getting text to about page

//check if logged in
session_start();

if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = false;
}

//connection to datanbase
include_once 'pdo-connect.php';

//get text data from database
try{
    $stmt = $conn->prepare("SELECT id, heading, text FROM texts");

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