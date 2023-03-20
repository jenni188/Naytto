<?php


$name = $_POST['name'];
$price = $_POST['price'];
$code = $_POST['code'];
$category = $_POST['category'];
$img = $_POST['img'];

include_once 'pdo-connect.php';

try{
    $stmt = $conn->prepare("INSERT INTO product (name, price, code, category, img) VALUES (:name, :price, :code, :category, :img) ");
    $stmt-> bindParam('name', $name);
    $stmt-> bindParam('price', $price);
    $stmt-> bindParam('code', $code);
    $stmt-> bindParam('category', $category);
    $stmt-> bindParam('img', $img);

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
    if(strpos($e->getMessage(), '1062 Duplicate entry')){
        $data = array(
            'error'=> 'Product code alredy excists!'
        );
    } else {
        $data = array(
            'error'=> 'Tapahtui jokin virhe tallennuksessa.'
        );
    }
 } 

 
header("Content-type: application/json;charset=utf-8");
echo json_encode($data);