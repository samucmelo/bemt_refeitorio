<?php
require_once ('conexao.php');

$id = $_GET['id'];
$status = $_GET['s'];

$sql  = "UPDATE funcionarios SET status = :status WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':status', $status, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
header("location: ./");