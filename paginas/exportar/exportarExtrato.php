<?php
$host = "localhost"; 
$usuario = "root";
$senha = "";
$banco = "bemt_refeitorio";
$conn = mysqli_connect($host, $usuario, $senha);
$db = mysqli_select_db($conn, $banco);
$arquivo = 'extrato.xls';
$tabela = '<table border="1">';
$tabela .= '<tr>';
$tabela .= '<td colspan="5">Extrato</tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>Matricula</b></td>';
$tabela .= '<td><b>Nome</b></td>';
$tabela .= '<td><b>Status</b></td>';
$tabela .= '<td><b>Situacao</b></td>';
$tabela .= '<td><b>Data Recebimento</b></td>';
$tabela .= '</tr>';
$resultado = mysqli_query($conn,'SELECT (case status when "1" then "TEM DIREITO AO ALMOÇO" when "0" then "NAO TEM DIREITO AO ALMOÇO" end) status, 
                                        matricula,
										nome,
                                        IFNULL((SELECT "ALMOÇOU" FROM entrega where entrega.cracha = funcionarios.cracha),"NAO ALMOÇOU") situacao,
                                        IFNULL((SELECT data FROM entrega where entrega.cracha = funcionarios.cracha),"") data
                                        FROM funcionarios');
while($dados = mysqli_fetch_array($resultado))
{
$tabela .= '<tr>';
$tabela .= '<td>'.$dados['matricula'].'</td>';
$tabela .= '<td>'.$dados['nome'].'</td>';
$tabela .= '<td>'.$dados['status'].'</td>';
$tabela .= '<td>'.$dados['situacao'].'</td>';
$tabela .= '<td>'.$dados['data'].'</td>';
$tabela .= '</tr>';
}
$tabela .= '</table>';
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/vnd.ms-excel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
echo $tabela;
?>