<?php
include_once '../model/Funcionario.php';
include_once '../model/FuncionarioDao.php';
include_once '../model/Filtro.php';

class ControllerFuncionario {
    private $funcionarioDao;
    
    public function __construct() {
        $this->funcionarioDao = new FuncionarioDao();
    }
    
    public function buscarPorId($id) {
        return $this->funcionarioDao->buscarPorId($id);
    }

    public function deletar($id) {
        return $this->funcionarioDao->deletar($id);
    }

    public function editar(Funcionario $funcionario) {
       return $this->funcionarioDao->editar($funcionario);
    }

    public function inserir(Funcionario $funcionario) {
        return $this->funcionarioDao->inserir($funcionario);
    }

    public function listarTodos() {
        return $this->funcionarioDao->listarTodos();
    }
    
    public function buscarComFiltro($filtros) {
      return $this->funcionarioDao->buscarComFiltro($filtros);  
    }
}
?>