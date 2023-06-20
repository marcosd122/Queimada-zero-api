<?php
include_once '../Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

echo json_encode($pdo->readUser());


?>