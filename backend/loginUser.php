<?php
session_start();

if (!isset($_POST['username']) || !isset($_POST['pwd'])){ 
    $data = array(
        'error'=> 'POST-dataa ei saatavilla. '
    );
    die();

}

$username = $_POST['username'];
$pwd = $_POST['pwd'];


include_once 'pdo-connect.php';

try {
    $stmt = $conn -> prepare("SELECT id, username, pwd FROM user WHERE username = :username");
    $stmt-> bindParam('username', $username);
    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
    } else{
        // käyttäjä löytyi
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pwd, $result['pwd'])) {
             $data = array(
                 'success'=> 'Login was successfull!'
             );

             $_SESSION['logged_in'] = true;
             $_SESSION['id'] = $result['id'];
             $_SESSION['username'] = $result['username'];

        } else{
            $data = array(
                'error'=> 'salasana on väärä'
                
            );

        }

    }
    
} catch(PDOException $e){
     $data = array(
        'error'=> 'Tapahtui jokin virhe'
    );
}


header("Content-type: application/json;charset=utf-8");
echo json_encode($data);