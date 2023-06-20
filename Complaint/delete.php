<?php
include_once '../Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

//print_r($_POST);
//$id = isset($_POST['id']) ? $_POST['id'] :'';

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

if($pdo->deleteComplaint($id)) {
    echo json_encode("Denúncia deletado com sucesso");
}else {
    echo json_encode("Erro ao deletar os dados");
}


?>