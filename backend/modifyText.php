<?php
//to modify text data 

session_start();

//check if logged in
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );
    header('Location: ../index.php');
    die();

}

//check if there is a text id
if (!isset($_GET['id'])){
    header('Location: ../homeAdmin.php');
}

//prepare variables
$json = file_get_contents('php://input');
$textData = json_decode($json);
$data = array();

//connection to database
include_once 'pdo-connect.php';

//updating data to text in database
try{
    $stmt = $conn->prepare("UPDATE texts SET heading = :heading, text = :text WHERE id = :id");
    $stmt->bindParam(":heading", $textData->heading);
    $stmt->bindParam(":text", $textData->text);
    $stmt->bindParam(":id", $textData->id);

    if($stmt->execute() == false){
        $data['error'] = 'Error modifying poll';
    } else{
        $data['success'] = 'Text edit success';
    }
}catch (PDOException $e){
    $data['error'] = $e->getMessage();
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);