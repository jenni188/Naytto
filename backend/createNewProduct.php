<?php


$name = $_POST['name'];
$code = $_POST['code'];
$category = $_POST['category'];
$desc1 = $_POST['desc1'];

include_once 'pdo-connect.php';

try{
    $stmt = $conn->prepare("INSERT INTO product (name, code, category, desc1) VALUES (:name, :code, :category, :desc1) ");
    $stmt-> bindParam('name', $name);
    $stmt-> bindParam('code', $code);
    $stmt-> bindParam('category', $category);
    $stmt-> bindParam('desc1', $desc1);

    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe tallennuksessa.'
        );
    } else{
        $data = array(
            'success'=> 'New product'
        );
    }

} catch(PDOException $e){
    $data = array(
      'error' => $e-> getMessage()
    );
 } 

 
header("Content-type: application/json;charset=utf-8");
echo json_encode($data);