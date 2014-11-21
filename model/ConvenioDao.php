<?php

include_once 'Dao.php';
include_once 'Convenio.php';

class ConvenioDao extends Dao {

    public function __construct() {
        parent::__construct();
    }

    public function buscarPorId($id) {
        try {
            $sql = 'select idconvenio, nome, idempresa
                        from convenio 
                        where idconvenio = :idconvenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idconvenio', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $convenio = new Convenio();
            $convenio->setId($row['idempresa']);
            $convenio->setNome($row['nome']);
            $convenio->setIdEmpresa($row['idempresa']);

            return $convenio;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar convenio ' . $ex->getMessage());
        }
    }

    public function deletar($id) {
        $this->con->beginTransaction();
        try {
            $sql = 'delete from convenio where idconvenio = :idconvenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idconvenio', $id);
            $stmt->execute();

            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao deletar convenio ' . $ex->getMessage());
        }
    }

    public function editar(Convenio $convenio) {
        $this->con->beginTransaction();
        try {
            $sql = 'update convenio set
                        nome = :nome,
                        idempresa = :idempresa
                        where idconvenio = :idconvenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':nome', $convenio->getNome());
            $stmt->bindValue(':idempresa', $convenio->getIdEmpresa());
            $stmt->bindValue(':idconvenio', $convenio->getid());
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao editar de convenio: ' . $ex->getMessage());
        }
    }

    public function inserir(Convenio $convenio) {
        $this->con->beginTransaction();
        try {
            $sql = 'insert into convenio(
                                nome,
                                idempresa)
                                values(
                                :nome,
                                :idempresa)';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':nome', $convenio->getNome());
            $stmt->bindValue(':idempresa', $convenio->getIdEmpresa());
            $stmt->execute();

            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao inserir de convenio: ' . $ex->getMessage());
        }
    }

    public function listarTodos() {
        try {
            $sql = 'select idconvenio, nome, idempresa
                        from convenio order by idconvenio';

            $stmt = $this->con->prepare($sql);

            $stmt->execute();

            $convenios = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $convenio = new Convenio();
                $convenio->setId($row['idempresa']);
                $convenio->setNome($row['nome']);
                $convenio->setIdEmpresa($row['idempresa']);
                $convenios[] = $convenio;
            }

            return $convenios;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar convenios ' . $ex->getMessage());
        }
    }

}

?>