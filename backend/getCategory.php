<?php

include_once 'pdo-connect.php';

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