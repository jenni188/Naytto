<?php

// if (!isset($_POST['fname']) || !isset($_POST['product0'])){
//     $data = array(
//         'error'=> 'POST-dataa ei saatavilla!!'
//     );
//     header("Content-type: application/json;charset=utf-8");
//     echo json_encode($data);
//     die();
// }

// Lähetä sähköposti
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pnumber = $_POST['pnumber'];
$email = $_POST['email'];
$select = $_POST['select'];



$products = array();
$amounts = array();

foreach ($_POST as $key => $value){
   if   (substr($key, 0, 7) == 'product' ){
        $products[] = $value;
   }
   if   (substr($key, 0, 5) == 'amount' ){
    $amounts[] = $value;
}
};




$to = "jenni.hynynen@esedulainen.fi";
$subject = "Tilaus lomakkeen tiedot";
$message = "
Etunimi: {$fname} 
Sukunimi: {$lname}
Puhelin numero: {$pnumber}
Sähköposti: {$email}
Maksutapa: {$select}
";

$index = 0;
foreach ($product in $products){
    $message += "Tuote: {$product} {$amounts[$index]}" . PHP_EOL;
}
mail($to,$subject,$message);

//echo ($message);
// Kun sähköposti on lähetetty lahetä tieto selaimelle
$data = array(
    'success' => 'Tilaus lähetetty...'
);


header("Content-type: application/json;charset=utf-8");
echo json_encode($data);