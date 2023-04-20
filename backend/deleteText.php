<?php
//deleting a text

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

//prepare variable
$textid = $_GET['id'];

//connection to database
include_once 'pdo-connect.php';

//delete text data from database
try{
    $stmt = $conn->prepare("DELETE FROM texts WHERE id = :textid ");
    $stmt->bindParam(':textid', $textid);

    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
    }else {
        $data = array(
            'success'=> 'Text removed!'
        );
    }

} catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe'
   );
}header("Content-type: application/json;charset=utf-8");
echo json_encode($data);