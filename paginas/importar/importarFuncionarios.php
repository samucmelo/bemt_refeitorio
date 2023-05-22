<?php
$host = "localhost"; 
$usuario = "root";
$senha = "";
$banco = "bemt_refeitorio";
$conn = mysqli_connect($host, $usuario, $senha);
$db = mysqli_select_db($conn, $banco);

$arquivo = fopen ('../../funcionarios.csv', 'r');
mysqli_query($conn,'INSERT INTO historico(cracha,data) SELECT cracha,data FROM entrega');
mysqli_query($conn,'DELETE FROM funcionarios');
mysqli_query($conn,'DELETE FROM entrega');
while(!feof($arquivo))
{
$linha = fgets($arquivo, 1024);
$dados = explode(';', $linha);

if($dados[0] != 'cracha' && !empty($linha))
{
mysqli_query($conn,'INSERT INTO funcionarios (matricula, cracha, nome, status) VALUES ("'.$dados[0].'", "'.$dados[1].'","'.$dados[2].'","'.$dados[3].'")');
}
}
fclose($arquivo);
echo '<meta http-equiv="refresh" content="0;URL=../../" />';
?>