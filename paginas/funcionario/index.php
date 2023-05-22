
<?php
require_once ('conexao.php');
$sth = $pdo->prepare("SELECT * FROM funcionarios ORDER BY 1 ASC");
$sth->execute();
$result = $sth->fetchAll();
$q1 = 0;
$q2 = 0;
foreach ($result as $t1) :
    if ($t1['status'] == 1) {
        $q1++;
    } else {
        $q2++;	
    }
endforeach;
?>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <h1 class="">Funcionários | <a href="../../">Home</a></h1>
    <table class="table table-striped table-hover" id="table">
        <thead>
            <tr>
                <th>
                    NOME
                </th>
				<th>
                    MATRICULA
                </th>
                <th>
                    CRACHÁ
                </th>
                <th>
                    STATUS
                </th>
                <th>
                    DELETAR
                </th>
            </tr>
        </thead>
            <tbody>
            <?php foreach ($result as $r) : ?>
                <tr>
                    <td>
                        <?php  echo $r['nome']; ?>
                    </td>

                    <td>
                        <?php  echo $r['matricula']; ?>
                    </td>
					
					<td>
                        <?php  echo $r['cracha']; ?>
                    </td>
                   
				   <td>
                        <?php if($r['status'] == 1 ){ ?>
                            <a href="update.php?id=<?php echo $r['id']; ?>&s=0" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                        <?php } else { ?>
                            <a href="update.php?id=<?php echo $r['id']; ?>&s=1" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-sm">DELETAR</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </table>
    <div id="piechart" style="width: 500px; height: 10px;"></div>
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" ></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            language: {
                url:'http://cdn.datatables.net/plug-ins/1.10.9/i18n/Portuguese-Brasil.json'
            }
        });

    } );
</script>
</body>
</html>