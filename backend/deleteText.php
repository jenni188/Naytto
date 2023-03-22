<?php

if (!isset($_GET['id'])){
    header('Location: ../about.php');
}


$textid = $_GET['id'];

include_once 'pdo-connect.php';

try{
    $stmt = $conn->prepare("DELETE FROM texts WHERE textid = :id ");
    $stmt->bindParam(':textid', $textid);

    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
    }else {
        $data = array(
            'success'=> 'Poll removed!'
        );
    }

} catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe'
   );
}header("Content-type: application/json;charset=utf-8");
echo json_encode($data);