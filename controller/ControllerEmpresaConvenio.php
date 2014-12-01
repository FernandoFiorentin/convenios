<?php
include_once '../model/EmpresaConvenio.php';
include_once '../model/EmpresaConvenioDao.php';

class ControllerEmpresaConvenio {
    private $emprConvDao;
    
    public function __construct() {
        $this->emprConvDao = new EmpresaConvenioDao();
    }
    
    public function buscarPorId($id) {
        return $this->emprConvDao->buscarPorId($id);
    }
    
    public function buscarPorIdEmpresa($idEmpresa) {
        return $this->emprConvDao->buscarPorIdEmpresa($idEmpresa);
    }
    
    public function buscarPorIdConvenio($idConvenio) {
        return $this->emprConvDao->buscarPorIdConvenio($idConvenio);
    }

    public function deletar($id) {
        return $this->emprConvDao->deletar($id);
    }

    public function editar(EmpresaConvenio $empresaConvenio) {
       return $this->emprConvDao->editar($empresaConvenio);
    }

    public function inserir(EmpresaConvenio $empresaConvenio) {
        return $this->emprConvDao->inserir($empresaConvenio);
    }

    public function listarTodos() {
        return $this->emprConvDao->listarTodos();
    }
}
?>