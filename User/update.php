<?php
include_once '../Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

$data = json_decode(file_get_contents("php://input"), false);
//print_r($data);

$id = $data->id;
$username = $data->username;
$email = $data->email;
$password = $data->password;
$adress = $data->adress;
$phone = $data->phone;


if($pdo->updateUser($id, $username, $email, $password, $adress, $phone)) {
    echo json_encode("Usuário atualizado com sucesso");
}else {
    echo json_encode("Erro ao atualizar os dados");
}


?>