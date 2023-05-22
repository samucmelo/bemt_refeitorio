<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
		
    <title>BEMT</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="form.js"></script>
    </head>
    <body style="background-color: #999999;">
        <div class="limiter">
		    <div class="container-login100">
		    <div class="login100-more" style="background-image: url('../../images/bg-01.jpg');"></div>
                <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                        <form action="busca.php" method="GET" id="ajax" onsubmit="return valida_form(this)" class="login100-form validate-form" id="reused_form">
                            <span class="login100-form-title p-b-59">
	
	<?php
	$host = "localhost"; 
    $usuario = "root";
    $senha = ""; 
    $banco = "bemt_refeitorio";
    $conn = mysqli_connect($host, $usuario, $senha);
    $db = mysqli_select_db($conn, $banco);
	$valor = filter_input(INPUT_GET, 'cracha');
	

	
	$sql1 = mysqli_query($conn,"SELECT CONCAT(cracha, ' - ' , nome) codigo, nome,cracha 
	                            FROM funcionarios 
								WHERE cracha = '".$valor."' 
                                AND status <> '0' 
								AND cracha NOT IN (SELECT cracha FROM entrega WHERE cracha= '".$valor."')");
	$linha1 = mysqli_num_rows($sql1);

    $sql2 = mysqli_query($conn,"SELECT 
	                           (SELECT CONCAT(nome) 
	                            FROM funcionarios 
								WHERE cracha = entrega.cracha) codigo,cracha, data 
								FROM entrega 
								WHERE cracha= '".$valor."'");
    $linha2 = mysqli_num_rows($sql2);

    $sql3 = mysqli_query($conn,"SELECT CONCAT(nome) codigo, nome,cracha 
	                            FROM funcionarios 
								WHERE cracha = '".$valor."' 
                                AND status <> '1' 
								AND cracha NOT IN (SELECT cracha FROM entrega WHERE cracha= '".$valor."')");
    $linha3 = mysqli_num_rows($sql3);
 
    if($linha1 > 0){
    while ($noticias = mysqli_fetch_object($sql1)) {
	$inserir = "INSERT INTO entrega (cracha, data) VALUES ('$valor', NOW());";
    mysqli_query($conn, $inserir) or die (mysqli_error($mysqli));
	echo "<script>
	      var audio1 = new Audio();
          audio1.src = '../../audio/leitor.mp3';
          audio1.play();
    </script>";
    echo '<meta http-equiv="refresh" content="0;URL= http://192.168.1.120:8080/bemt_refeitorio/paginas/cracha/verificar.php" />';
	} 
    }
    if($linha2 == 0){
    while ($noticias = mysqli_fetch_object($sql3)) {
	echo $noticias->codigo . " - Não Pode Almoçar.</a><br />";
	echo "<script>
	      var audio1 = new Audio();
          audio1.src = '../../audio/error.mp3';
          audio1.play();
    </script>";
    echo '<meta http-equiv="refresh" content="1;URL= http://192.168.1.120:8080/bemt_refeitorio/paginas/cracha/verificar.php" />';
	 }
    }
    if($linha3 == 0){
    while ($noticias = mysqli_fetch_object($sql2)) {
	echo $noticias-> codigo ." - Já Almoçou.</a><br />";
	echo "<script>
	      var audio1 = new Audio();
          audio1.src = '../../audio/error.mp3';
          audio1.play();
    </script>";
	echo '<meta http-equiv="refresh" content="1;URL= http://192.168.1.120:8080/bemt_refeitorio/paginas/cracha/verificar.php" />';
	
    }
    }
    header("Content-Type: text/html; charset=ISO-8859-1",true);
	?>
					    </span>
						<div class="container-login100-form-btn">
						<p><div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<a class="login100-form-btn" href="/../bemt_refeitorio/paginas/cracha/verificar.php">
								Voltar
							</a>
							<p></p>
						</div><p/>
					    </div>
                        </form>
                </div>
            </div>
        </div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../../vendor/animsition/js/animsition.min.js"></script>
	<script src="../../vendor/bootstrap/js/popper.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../vendor/select2/select2.min.js"></script>
	<script src="../../vendor/daterangepicker/moment.min.js"></script>
	<script src="../../vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../../vendor/countdowntime/countdowntime.js"></script>
	<script src="../../js/main.js"></script>
</body>
</html>