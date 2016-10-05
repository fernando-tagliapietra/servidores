<?php

require_once '../DAO/ServidorDAO.php';
require_once '../Helpers/MsgHelper.php';


class ServidorController{

	
	public static function listar($start = 0, $limit){
		
		$servidorDao = new ServidorDAO(null);
		
		$resultado = $servidorDao->listar($start, $limit);
		
		$servidores = array();
		
		foreach ($resultado as $servidor){
			$servidores[] = $servidor->toArray();	
		}
		
		return $servidores; 
			
	}
	
	
	public static function adicionar($nome, $ip, $email){
		
		$servidor =  new Servidor(null, $nome, $ip, $email);
		$servidorDao = new ServidorDAO($servidor);
		
		$success = false;
		$msg = "";
		
		
		if (!$ip)
			MsgHelper::setMessage("Forneça o IP para o novo servidor.", false);
			
		elseif($servidorDao->verificar())
			MsgHelper::setMessage( "IP já cadastrado", false);
			
		else{
			
			$servidorDao->adicionar();
			MsgHelper::setMessage( "Servidor cadastrado com sucesso", true);
			$success = true;
			
		}
		
		return $success;
		
		
	}
	
	

}