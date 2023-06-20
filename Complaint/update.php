<?php
include_once '../Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

$data = json_decode(file_get_contents("php://input"), false);
//print_r($data);

$id = $data->id;
$date = $data->date;
$time = $data->time;
$description = $data->description;
$img = $data->img;



if($pdo->updateComplaint($id, $date, $time, $description, $img)) {
    echo json_encode("Usuário atualizado com sucesso");
}else {
    echo json_encode("Erro ao atualizar os dados");
}


?>