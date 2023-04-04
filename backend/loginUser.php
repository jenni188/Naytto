<?php
//to login as admin

session_start();
// check if there is a username and password
if (!isset($_POST['username']) || !isset($_POST['pwd'])){ 
    $data = array(
        'error'=> 'POST-dataa ei saatavilla. '
    );
    die();

}

//prepare variables
$username = $_POST['username'];
$pwd = $_POST['pwd'];

//connection to database
include_once 'pdo-connect.php';

//get user data from database
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
             $_SESSION['user_id'] = $result['id'];
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