<?php

$heading = $_POST['heading'];
$text = $_POST['text'];


include_once 'pdo-connect.php';

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