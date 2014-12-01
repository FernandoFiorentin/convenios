<?php

include_once 'Dao.php';
include_once 'Convenio.php';

class ConvenioDao extends Dao {

    public function __construct() {
        parent::__construct();
    }

    public function buscarPorId($id) {
        try {
            $sql = 'select idconvenio, nome
                        from convenios 
                        where idconvenio = :idconvenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idconvenio', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $convenio = new Convenio();
            $convenio->setId($row['idconvenio']);
            $convenio->setNome($row['nome']);

            return $convenio;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar convenio ' . $ex->getMessage());
        }
    }

    public function deletar($id) {
        $this->con->beginTransaction();
        try {
            $sql = 'delete from convenios where idconvenio = :idconvenio';

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
            $sql = 'update convenios set
                        nome = :nome                        
                        where idconvenio = :idconvenio';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':nome', $convenio->getNome());
            $stmt->bindValue(':idconvenio', $convenio->getId());
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
            $sql = 'insert into convenios(nome)
                                  values(:nome)';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':nome', $convenio->getNome());
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
            $sql = 'select idconvenio, nome
                        from convenios order by idconvenio';

            $stmt = $this->con->prepare($sql);

            $stmt->execute();

            $convenios = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $convenio = new Convenio();
                $convenio->setId($row['idconvenio']);
                $convenio->setNome($row['nome']);
                $convenios[] = $convenio;
            }

            return $convenios;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar convenios ' . $ex->getMessage());
        }
    }

}

?>