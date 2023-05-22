<?php
include_once "conexao.php";
?>
<!doctype html>
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
	
	<script type="text/javascript">
    $("input[name='cracha']").on('blur', function(){
    var cracha = $(this).val();
	
	
    $.get('busca.php?cracha=' + cracha,function(data){
    $('#resultado').html(data);
    });

	
    });
	
    </script>
	<script type="text/javascript">
						
			$.get('buscarquant.php?cracha=' + cracha,function(data){
			$('#resultado').html(data);
			});
			
			
	
	</script>

    <script src="form.js"></script>
    </head>
    <body style="background-color: #999999;">
        <div class="limiter">
		    <div class="container-login100">
		    <div class="login100-more" style="background-image: url('../../images/bg-01.jpg');"></div>
                <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
								<form action="busca.php" method="GET" id="ajax" onsubmit="return valida_form(this)" class="login100-form validate-form" id="reused_form">
									<a href="../../">
									<span class="login100-form-title p-b-59">
									Verificar | Home
									</span></a>
									<div class="wrap-input100 validate-input" >
											<span class="label-input100">CRACHÁ</span>
											<input name="cracha" id="cracha" onkeyup="buscarNoticias(this.value)" type="number" placeholder="cracha..." class="input100" required class="validate" autofocus>
											<span class="focus-input100"></span>
									<a >
									</form>	
							<body>
		        <p align="center">
								<span class="label-input100">QTD ALMOÇOS - 
                           
                            <?php        
                                $query_qtd = "SELECT COUNT(cracha) AS qtd FROM entrega";
                                $result_qtd = $conn->prepare($query_qtd);
                                $result_qtd->execute();

                                $row_qtd= $result_qtd->fetch(PDO::FETCH_ASSOC);
                                echo "" . $row_qtd['qtd'] . "<br>";
                                ?>
                            </span>
				</p>
							</body>							
                    </div>
            </div>
        </div>

	</body>
	<body>

	</body>

</html>
