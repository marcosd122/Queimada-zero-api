<?php
include_once '../Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

//print_r($_POST);

//$username = isset($_POST['username']) ? $_POST['username'] :'';
//$email = isset($_POST['email']) ? $_POST['email'] :'';
//$password = isset($_POST['password']) ? $_POST['password'] :'';
//$adress = isset($_POST['adress']) ? $_POST['adress'] :'';
//$phone = isset($_POST['phone']) ? $_POST['phone'] :'';

$data = json_decode(file_get_contents("php://input"));
//print_r($data);
$username = $data->username;
$email = $data->email;
$password = $data->password;
$adress = $data->adress;
$phone = $data->phone;

//$pdo->createUser($username, $email, $password, $adress, $phone);

if($pdo->createUser($username, $email, $password, $adress, $phone)) {
    echo json_encode("Usuário criado com sucesso");
}else {
    echo json_encode("Erro ao inserir os dados");
}


?>