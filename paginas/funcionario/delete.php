<?php
require_once ('conexao.php');
$id = $_GET['id'];
$sql = "DELETE FROM funcionarios WHERE id =  :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
header("location: ./");