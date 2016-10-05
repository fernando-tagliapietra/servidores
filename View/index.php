<?php

	require_once ('../Controller/ServidorController.php');
	require_once ('../Helpers/MsgHelper.php');
	$servidores = ServidorController::listar(0, null);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Servidores</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../Static/css/bootstrap.min.css" ></link>
<script type="text/javascript" src="../Static/js/bootstrap.min.js" ></script>


</head>
<body>



<h1>Servidores</h1>
<a href="<?=PROJECT_SERVIDOR_URL?>" class="btn btn-success">Criar servidor </a>
<?php 

	$msg = MsgHelper::getMessage();
	
	$alerta = "";
	$texto = "";
	
	if ($msg){
		
		$texto = $msg['mensagem'];
		$alerta = ($msg['sucesso']) ? "success" : "warning";

?>

<div class="alert alert-<?=$alerta?>"><?=$texto?></div>
<?php }?>


<table class="table">

	<tr>
		<th>Nome</th>
		<th>IP</th>
		<th>Email</th>
		<th>Ativo</th>
	</tr>
	
	
	
	
	<?php  foreach ($servidores as $servidor) {?>
	
	
	<tr>
		<td><?=$servidor['nome']?></td>
		<td><?=$servidor['ip']?></td>
		<td><?=$servidor['email']?></td>
		<td><?=$servidor['ativo']?></td>
	
	
	</tr>
	<?php } ?>	



</table>





</body>
</html>