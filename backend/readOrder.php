<?php
include_once('../env.php');
//reading the order form and sending it as an email to halla

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

$data = '';
$index = 0;
foreach ($_POST as $key => $value){
    if (strcmp(substr($key,0,7), "product") === 0) {
       array_push($products, $value);
    }
    if (strcmp(substr($key,0,6), "amount") === 0) {
        array_push($amounts, $value);
     }
};

for ($i = 0; $i < count($products); $i++){
    $data .= "Tuotekoodi: {$products[$i]}  Määrä: {$amounts[$i]}" . PHP_EOL;
}


$to = EMAIL;
$subject = "Tilaus lomakkeen tiedot";
$headers =  "From: {$email}" . PHP_EOL 
		    ."Reply-To: {$email}" . PHP_EOL
            .'Content-Type: text/plain; charset=UTF-8';
$message = "
Etunimi: {$fname} ".PHP_EOL."
Sukunimi: {$lname}".PHP_EOL."
Puhelin numero: {$pnumber}".PHP_EOL."
Sähköposti: {$email}".PHP_EOL."
Maksutapa: {$select}".PHP_EOL."
Tuotteet: ".PHP_EOL."
{$data}
";

// echo($message);

// $index = 0;
// foreach ($product in $products){
//     $message += "Tuote: {$product} {$amounts[$index]}" . PHP_EOL;
// }
if (mail($to,$subject,$message, $headers)){
    $data = array(
        'success' => 'Tilaus lähetetty...'
    );
} else {
    $data = array(
        'error' => 'Joku ongelma'
    );
}

//echo ($message);
// Kun sähköposti on lähetetty lahetä tieto selaimelle



header("Content-type: application/json;charset=utf-8");
echo json_encode($data);