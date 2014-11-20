<?php


class EmpresaDao extends Dao {

    public function __construct() {
        parent::__construct();
    }
    
    public function buscarPorId($id) {
        echo 'buscar';
    }

    public function deletar($id) {
        echo 'deletar '.$id;
    }

    public function editar(Empresa $empresa) {
        echo 'editar';
    }

    public function inserir(Empresa $empresa) {
        echo 'inserir';
    }

    public function listarTodos() {
        echo 'listar todos';
    }

}

?>
