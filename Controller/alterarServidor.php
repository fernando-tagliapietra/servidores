<?php

require_once '../DAO/ServidorDAO.php';

$id		= $_POST['id'];
$nome 	= $_POST['nome'];
$ip 	= $_POST['ip'];
$email 	= $_POST['email'];

$servidor =  new Servidor($id, $nome, $ip, $email);
$servidorDao = new ServidorDAO($servidor);

$success = false;
$msg = "";


if (!$ip)
	$msg = "Para editar, selecione um Servidor existente";
elseif($servidorDao->verificar())
	$msg = "IP já cadastrado";
else{
	$servidorDao->alterar();
	$msg = "Servidor alterado com sucesso";
}	
			


//redirect