<?php

//Login

include_once 'Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

//print_r($_POST);

//echo $email = $_POST['email'];
//echo $password = $_POST['password'];

//$email = isset ($_POST['email']) ? $_POST['email'] :'';
//$password = ($_POST['password']) ? $_POST['password'] :'';

$data = json_decode(file_get_contents("php://input"), false);
print_r($data);

$email = $data->email;
$password = $data->password;

if($pdo->login($email, $password)) {
    echo ("Usuário logado com sucesso");
}else {
    echo ("Erro ao localizar os dados do usuário");
}


?>