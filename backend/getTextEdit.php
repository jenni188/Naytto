<?php
//getting text to edit text page

//check if logged in
session_start();

if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = false;
}


//check if there
if (!isset($_GET['id'])){
    header('Location: ../about.php');
}

//prepare variable
$textid = $_GET['id'];

//connection to database
include_once 'pdo-connect.php';

//get text data from database
try{
    $stmt = $conn->prepare("SELECT id, heading, text FROM texts WHERE  id = :textid");

    $stmt->bindParam(':textid', $textid);

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