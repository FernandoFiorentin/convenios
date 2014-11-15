<?php

class {
	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $idEmpresa;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}


	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getIdEmpresa(){
		return $this->idEmpresa;
	}

	public function setIdEmpresa($idEmpresa){
		$this->idEmpresa = $idEmpresa;
	}
}
?>