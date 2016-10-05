<?php


require_once '../Model/Servidor.php';
require_once 'Conexao.php';
require_once 'IDAO.php';


class ServidorDAO extends Conexao implements IDAO{
	
	function __construct($servidor){
		parent::__construct();
		$this->servidor = $servidor;
	}
	
	public function adicionar(){
		
		$nome 	= $this->servidor->getNome();
		$ip	  	= $this->servidor->getIp();
		$email 	= $this->servidor->getEmail();
		
		$query = sprintf("INSERT INTO servidor (nome, ip, email) values ('$nome', '$ip', '$email')");
		$rs = mysqli_query($this->conexao, $query);
		
		return true;
		
	} 
		
	public function selecionar(){
		
		
	}
	
	public function excluir(){
		
	}
	
	public function listar($start, $limit){
		
		
		$queryString = "SELECT * FROM servidor"; //  ORDER BY id DESC LIMIT $start, $limit";
		
		$resultado = mysqli_query($this->conexao, $queryString) or die(mysqli_error($this->conexao));
		
		if (null)
			return  array();
		
		
		$servidores = array();
		
		while($servidor = mysqli_fetch_assoc($resultado)){
			$server =  new Servidor($servidor['id'], $servidor['nome'], $servidor['ip'], $servidor['email']);
			$server->setAtivo();
			$servidores[] = $server;
		}
		
		return $servidores;
	}
	
	
	public function verificar(){
		
		$ip =  $this->servidor->getIp();
		$id =  $this->servidor->getID();
		
		if ($id)
			$querySelect	= sprintf("SELECT * FROM servidor WHERE ip = '$ip' AND id != $id ");
		else 
			$querySelect	= sprintf("SELECT * FROM servidor WHERE ip = '$ip'");
			
		$rs			    = @mysqli_query($this->conexao, querySelect);
		
		if (mysqli_num_rows($rs) > 0) 
			return true;
		
		return false;
	}
	

	public function alterar(){
		
		$id 	= $this->servidor->getID();
		$nome 	= $this->servidor->getNome();
		$ip	  	= $this->servidor->getIp();
		$email 	= $this->servidor->getEmail();
		
		$query	= sprintf("UPDATE servidor SET nome='$nome', ip='$ip', email='$email' WHERE id= $id ");
		$rs = mysqli_query($this->conexao, $query);
		
		return true;
		
	}
	
	
}





?>