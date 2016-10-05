<?php 

	require_once ('../Controller/ServidorController.php');
	require_once ('../Helpers/MsgHelper.php');

	

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Servidores</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../Static/css/bootstrap.min.css" ></link>
<script type="text/javascript" src="../Static/js/bootstrap.min.js" ></script>


<?php 

if(isset($_GET['submit'])){

	$nome	= $_POST['nome'];
	$ip   	= $_POST['ip'];
	$email	= $_POST['email'];

	$sucesso = ServidorController::adicionar($nome, $ip, $email);

	if($sucesso)
		 header("location:".PROJECT_MAIN_URL);
	else
		 header("location:".PROJECT_SERVIDOR_URL);

}

?>


</head>
<body>





<h1>Criar/Editar Servidor</h1>

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

<form action="<?=PROJECT_SERVIDOR_URL."?submit"?>"  method="post">

	<label for="nome">Nome</label>
	<input type="text" name="nome" id="nome" class="form-control"/>
	
	<label for="ip">IP</label>
	<input type="text" name="ip" id="ip" class="form-control"/>
	
	<label for="email">EMAIL</label>
	<input type="text" name="email" id="email" class="form-control"/>
	
	<button type="submit" class="btn btn-primary">Confirmar</button>
	

</form>




</body>
</html>


