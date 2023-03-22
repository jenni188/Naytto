<?php


$json = file_get_contents('php://input');
$textData = json_decode($json);
$data = array();

include_once 'pdo-connect.php';

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