<?php
//creating a new text

// check if logged in 
session_start();
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );
    die();
}

// prepare variables
$heading = $_POST['heading'];
$text = $_POST['text'];

// connection to database
include_once 'pdo-connect.php';

//get data from database
try{
     $stmt = $conn->prepare("INSERT INTO texts (heading, text) VALUES (:heading, :text)");
     $stmt->bindParam('heading', $heading);
     $stmt->bindParam('text', $text);

     if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe tallennuksessa.'
        );
    } else{
        $data = array(
            'success'=> 'New text'
        );
    }
}catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe!'
   );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);