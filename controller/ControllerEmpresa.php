<?php
include_once '../model/Empresa.php';
include_once '../model/EmpresaDao.php';

class ControllerEmpresa {
    private $empresaDao;
    
    public function __construct() {
        $this->empresaDao = new EmpresaDao();
    }
    
    public function buscarPorId($id) {
        return $this->empresaDao->buscarPorId($id);
    }

    public function deletar($id) {
        return $this->empresaDao->deletar($id);
    }

    public function editar(Empresa $empresa) {
       return $this->empresaDao->editar($empresa);
    }

    public function inserir(Empresa $empresa) {
        return $this->empresaDao->inserir($empresa);
    }

    public function listarTodos() {
        return $this->empresaDao->listarTodos();
    }
}
?>