<?php

//Conexão com banco de dados 
require_once  ('../local.php');


class Conexao{
	
	protected $conexao; 
	protected $banco;
	
	function __construct(){

		$this->conexao = @mysqli_connect(DB_HOST, DB_USER, DB_PASS);// or die (mysql_error());
		$this->banco   = mysqli_select_db( $this->conexao, DB_NAME) or die (mysql_error());
		
		
	}
	

	
	
	
	
	
}



?>