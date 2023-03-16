<?php
include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("SELECT contact_text FROM teksti");

    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
    } else {
        $text = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = $text;
    }

} catch(PDOException $e){
    $data = array(
        'error'=> 'Tapahtui jokin virhe'
    );
}
header("Content-type: application/json;charset=utf-8");
echo json_encode($data);