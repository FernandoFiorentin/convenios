<?php

include_once 'Dao.php';
include_once 'EmpresaConvenio.php';

class EmpresaConvenioDao extends Dao {

    public function __construct() {
        parent::__construct();
    }

    public function buscarPorId($id) {
        try {
            $sql = 'select id_empresa_convenio, idconvenio, idempresa
                        from empresa_convenio 
                        where id_empresa_convenio = :id_empresa_convenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':id_empresa_convenio', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $empresaConvenio = new EmpresaConvenio();
            $empresaConvenio->setId($row['id_empresa_convenio']);
            $empresaConvenio->setIdEmpresa($row['idempresa']);
            $empresaConvenio->setIdConvenio($row['idconvenio']);

            return $empresaConvenio;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar empresa_convenio ' . $ex->getMessage());
        }
    }

    public function buscarPorIdEmpresa($idEmpresa) {
        try {
            $sql = 'select id_empresa_convenio, idconvenio, idempresa
                        from empresa_convenio 
                        where idempresa = :idempresa';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idempresa', $idEmpresa);
            $stmt->execute();

            $convenios = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $empresaConvenio = new EmpresaConvenio();
                $empresaConvenio->setId($row['id_empresa_convenio']);
                $empresaConvenio->setIdEmpresa($row['idempresa']);
                $empresaConvenio->setIdConvenio($row['idconvenio']);
                $convenios[] = $empresaConvenio;
            }
            return $convenios;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar empresa_convenio ' . $ex->getMessage());
        }
    }

    public function buscarPorIdConvenio($idConvenio) {
        try {
            $sql = 'select id_empresa_convenio, idconvenio, idempresa
                        from empresa_convenio 
                        where idconvenio = :idconvenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idconvenio', $idConvenio);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $convenios = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $empresaConvenio = new EmpresaConvenio();
                $empresaConvenio->setId($row['id_empresa_convenio']);
                $empresaConvenio->setIdEmpresa($row['idempresa']);
                $empresaConvenio->setIdConvenio($row['idconvenio']);
                $convenios[] = $empresaConvenio;
            }
            return $convenios;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar empresa_convenio ' . $ex->getMessage());
        }
    }

    public function deletar($id) {
        $this->con->beginTransaction();
        try {
            $sql = 'delete from empresa_convenio where id_empresa_convenio = :id_empresa_convenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':id_empresa_convenio', $id);
            $stmt->execute();

            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao deletar empresa_convenio ' . $ex->getMessage());
        }
    }

    public function editar(EmpresaConvenio $empresaConvenio) {
        $this->con->beginTransaction();
        try {
            $sql = 'update empresa_convenio set                        
                        idempresa = :idempresa,
                        idconvenio = :idconvenio
                        where id_empresa_convenio = :id_empresa_convenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':id_empresa_convenio', $empresaConvenio->getid());
            $stmt->bindValue(':idempresa', $empresaConvenio->getIdEmpresa());
            $stmt->bindValue(':idconvenio', $empresaConvenio->getIdConvenio());
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao editar de empresa_convenio: ' . $ex->getMessage());
        }
    }

    public function inserir(EmpresaConvenio $empresaConvenio) {
        $this->con->beginTransaction();
        try {
            $sql = 'insert into empresa_convenio(
                                idempresa,
                                idconvenio)
                                values(
                                :idempresa,
                                :idconvenio)';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idempresa', $empresaConvenio->getIdEmpresa());
            $stmt->bindValue(':idconvenio', $empresaConvenio->getIdConvenio());
            $stmt->execute();

            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao inserir de empresa_convenio: ' . $ex->getMessage());
        }
    }

    public function listarTodos() {
        try {
            $sql = 'select id_empresa_convenio, idconvenio, idempresa
                        from empresa_convenio order by id_empresa_convenio';

            $stmt = $this->con->prepare($sql);

            $stmt->execute();

            $convenios = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $empresaConvenio = new EmpresaConvenio();
                $empresaConvenio->setId($row['id_empresa_convenio']);
                $empresaConvenio->setIdEmpresa($row['idempresa']);
                $empresaConvenio->setIdConvenio($row['idconvenio']);

                $convenios[] = $empresaConvenio;
            }

            return $convenios;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar convenios ' . $ex->getMessage());
        }
    }

}

?>