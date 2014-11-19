<?php

class Empresa {

	private $id;
	private $fantasia;
	private $cnpj;
	private $razaoSocial;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFantasia(){
		return $this->fantasia;
	}

	public function setFantasia($fantasia){
		$this->fantasia = $fantasia;
	}
	
	public function getCnpj(){
		return $this->cnpj;
	}

	public function setCnpj($cnpj){
		$this->cnpj = $cnpj;
	}

	public function getRazaoSocial(){
		return $this->razaoSocial;
	}

	public function setRazaoSocial($razaoSocial){
		$this->razaoSocial = $razaoSocial;
	}
}
?>