<?php
require_once ('conexao.php');
/*
 * Inserindo dados na tabela de tarefas
 */
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
if(isset($matricula) != "" && isset($nome) != "") {
    $status = 1;
    $sql = $pdo->prepare("INSERT INTO funcionarios (nome, matricula, cracha, status) VALUES (:nome, :matricula, :cracha, :status)");
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':matricula', $matricula);
	$sql->bindParam(':cracha', $matricula);
    $sql->bindParam(':status', $status);
    $sql->execute();

    header("location: ./");
}

?>


