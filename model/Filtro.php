<?php

class Filtro{
    private $campo;
    private $operador;
    private $valor;
    
    public function __construct($campo, $operador, $valor){
        $this->campo = $campo;
        $this->operador = $operador;        
        $this->valor = $valor;                
    }    
    
    public function getCampo(){
        return $this->campo;
    }
    
    public function getOperador(){
        return $this->operador;
    }
    
    public function getValor(){
        return $this->valor;
    }
}