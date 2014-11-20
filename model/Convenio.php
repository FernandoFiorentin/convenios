<?php

class Convenio{
	private $nome;
	private $empresa;
	
	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
}
?>