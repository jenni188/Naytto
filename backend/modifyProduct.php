<?php
//to modify product data

session_start();
// check if logged in
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error'=> 'You are not allowed here!'
    );

    header("Content-type: application/json;charset=utf-8");
    echo json_encode($data);
    die();
}

// Get normal form-fields
$id = $_POST['id'];
$name = $_POST['p-name'];
$price = $_POST['p-price'];
$code = $_POST['p-code'];
$category = $_POST['p-category'];

// Get imagefile
$imageExists = $_FILES['p-img']['error'] == 4 ? false : true;

//connection to database
include_once 'pdo-connect.php';

try{
    if ($imageExists) {
        
        $stmt = $conn->prepare("UPDATE product SET img = :img, category = :category, name = :name, code = :code, price = :price WHERE id = :id");
        // Bind imagefile as large object
        $imageData = file_get_contents($_FILES['p-img']['tmp_name']);
        $stmt-> bindParam('img', $imageData, PDO::PARAM_LOB);
    } else {
        $stmt = $conn->prepare("UPDATE product SET category = :category, name = :name, code = :code, price = :price WHERE id = :id");
    }
    
    $stmt-> bindParam('id', $id);
    $stmt-> bindParam('name', $name);
    $stmt-> bindParam('price', $price);
    $stmt-> bindParam('code', $code);
    $stmt-> bindParam('category', $category);


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