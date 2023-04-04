<?php
ob_start();

include_once 'pdo-connect.php';

$productid = $_GET['id'];

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
    } else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $imageData = $row['img'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $contentType = finfo_buffer($finfo, $imageData);
        ob_end_clean();
        header("Content-Type: " . $contentType);
        echo $imageData;     
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