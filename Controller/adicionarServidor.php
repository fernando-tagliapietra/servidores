<?php

require_once '../DAO/ServidorDAO.php';

$nome 	= $_POST['nome'];
$ip 	= $_POST['ip'];
$email 	= $_POST['email'];

$servidor =  new Servidor(null, $nome, $ip, $email);
$servidorDao = new ServidorDAO($servidor);

$success = false;
$msg = "";


if (!$ip)
	$msg = "Forne�a o IP para o novo servidor.";
elseif($servidorDao->verificar())
	$msg = "IP j� cadastrado";
else{
	$servidorDao->adicionar();
	$msg = "Servidor cadastrado com sucesso";
}	
			
//redirect


?>