<?php

// Get normal form-fields
$name = $_POST['p-name'];
$price = $_POST['p-price'];
$code = $_POST['p-code'];
$category = $_POST['p-cateory'];

// Get imagefile
$imageData = file_get_contents($_FILES['productimage']['tmp_name']);

include_once 'pdo-connect.php';

try{
    $stmt = $conn->prepare("INSERT INTO product (name, price, code, category, img) VALUES (:name, :price, :code, :category, :img) ");
    $stmt-> bindParam('name', $name);
    $stmt-> bindParam('price', $price);
    $stmt-> bindParam('code', $code);
    $stmt-> bindParam('category', $category);
    
    // Bind imagefile as large object
    $stmt-> bindParam('img', $imageData, PDO::PARAM_LOB);

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