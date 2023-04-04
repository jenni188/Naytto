<?php
//creating an admin user
//THIS FILE HAS TO BE REMOVED AFTER CREATING ONE USER!!

//prepare varialbles
$username = $_GET['username'];
$password = password_hash($_GET['password'], PASSWORD_DEFAULT);

//connection to database
include_once 'pdo-connect.php';

//insert user data to database
try {
    $stmt = $conn -> prepare("INSERT INTO user (username, pwd) VALUES (:username, :pwd) ");
    $stmt-> bindParam('username', $username);
    $stmt-> bindParam('pwd', $password);
    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe tallennuksessa.'
        );
    } else{
        $data = array(
            'success'=> 'Uusi käyttäjä on luotu.'
        );
    }
    
} catch(PDOException $e){
    if(strpos($e->getMessage(), '1062 Duplicate entry')){
        $data = array(
            'error'=> 'User alredy excists!'
        );
    } else {
        $data = array(
            'error'=> 'Tapahtui jokin virhe tallennuksessa.'
        );
    }
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);