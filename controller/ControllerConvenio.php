<?php
include_once '../model/Convenio.php';
include_once '../model/ConvenioDao.php';

class ControllerConvenio {
    private $convenioDao;
    
    public function __construct() {
        $this->convenioDao = new ConvenioDao();
    }
    
    public function buscarPorId($id) {
        return $this->convenioDao->buscarPorId($id);
    }

    public function deletar($id) {
        return $this->convenioDao->deletar($id);
    }

    public function editar(Convenio $convenio) {
       return $this->convenioDao->editar($convenio);
    }

    public function inserir(Convenio $convenio) {
        return $this->convenioDao->inserir($convenio);
    }

    public function listarTodos() {
        return $this->convenioDao->listarTodos();
    }
}
?>