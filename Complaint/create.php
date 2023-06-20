<?php
include_once '../Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

//print_r($_POST);

//$date = isset($_POST['date']) ? $_POST['date'] :'';
//$time = isset($_POST['time']) ? $_POST['time'] :'';
//$description = isset($_POST['description']) ? $_POST['description'] :'';
//$img = isset($_POST['img']) ? $_POST['img'] :'';

$data = json_decode(file_get_contents("php://input"));
//print_r($data);
$date = $data->date;
$time = $data->time;
$description = $data->description;
$img = $data->img;

//$pdo->createUser($username, $email, $password, $adress, $phone);

if($pdo->createComplaint($date, $time, $description, $img)) {
    echo json_encode("Denúncia inserida com sucesso");
}else {
    echo json_encode("Erro ao inserir os dados");
}


?>