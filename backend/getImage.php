<?php

$productid = $_GET['id'];

include_once 'pdo-connect.php';

try{
    $stmt = $conn->prepare("SELECT img FROM product WHERE id = :productid");
    $stmt->bindParam(':productid', $productid);
    
    if ($stmt -> execute() == false){
        $data = array(
            'error'=> 'Tapahtui jokin virhe'
        );
        header("Content-type: application/json;charset=utf-8");
        echo json_encode($data);
        die();
    }else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // header("Content-type: " . $row->type);
        echo '<img src="'.$row['img'].'" />';
        
    }
}catch(PDOException $e){
    $data = array(
       'error'=> 'Tapahtui jokin virhe!'
    );
    header("Content-type: application/json;charset=utf-8");
    echo json_encode($data);
    die();
}


	

// $sql = "SELECT * FROM `images` WHERE `id` = " . $_GET["id"];
// 	$result = mysqli_query($conn, $sql);
// 	if (mysqli_num_rows($result) == 0)
// 	{
// 		die("File does not exists.");
// 	}
// 	$row = mysqli_fetch_object($result);
//     header("Content-type: " . $row->type);
// 	echo $row->image;