<?php

class EmpresaConvenio {

    private $id;    
    private $idEmpresa;
    private $idconvenio;
    

    public function getid() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }    

    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }
    
    public function getIdConvenio() {
        return $this->idconvenio;
    }

    public function setIdConvenio($idConvenio) {
        $this->idconvenio = $idConvenio;
    }

}

?>
