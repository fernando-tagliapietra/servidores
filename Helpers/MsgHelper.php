<?php

class MsgHelper{
	
	
	public static function setMessage($mensagem, $sucesso){
		$_SESSION['mensagem'] = $mensagem;
		$_SESSION['sucesso']  = $sucesso;   //false: vazio  true: com element
	}
	
	
	public static function getMessage(){
		
		if (!isset($_SESSION['mensagem']))
			return array();
			
		
		return array(
				'mensagem' => $_SESSION['mensagem'],
				'sucesso'  => $_SESSION['sucesso']
		);
	} 
	
	
	
	
	
	
}













?>