<?php

require_once ('../Helpers/SocketHelper.php');

class Servidor{
	
	private $id;
	private $nome;
	private $ip;
	private $email;
	private $ativo;
	
	function __construct($id, $nome, $ip,  $email){
		$this->id 		= $id;
		$this->nome 	= $nome;
		$this->ip   	= $ip;
		$this->email 	= $email;
	}
	
	
	public function  setID($id){
		$this->id = $id;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setIp($ip){
		$this->ip = $ip;
	}
	
	public function setEmail($email){
		$this->email = $email; 
	}
	
	public function setAtivo(){
		
		$this->ativo = 0;
		if ($this->ip)
			if (@ping($this->ip))
				$this->ativo = 1;
	}
	
	public function getID(){
		return $this->id;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getIp(){
		return $this->ip;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getAtivo(){
		return $this->ativo;
	}
	
	function toArray(){
		
		return array(
				"id" 	=> $this->id,
				"nome" 	=> $this->nome,
				"ip" 	=> $this->ip,
				"email" => $this->email,
				"ativo" => $this->ativo
		);
		
	}
}

?>