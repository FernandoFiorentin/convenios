<?php

include_once 'Dao.php';
include_once 'Empresa.php';

class EmpresaDao extends Dao {

    public function __construct() {
        parent::__construct();
    }

    public function buscarPorId($id) {
        try {
            $sql = 'select idempresa, fantasia, cnpj, razao_social
                        from empresa 
                        where idempresa = :idempresa';
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idempresa', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $empresa = new Empresa();
            $empresa->setId($row['idempresa']);
            $empresa->setFantasia($row['fantasia']);
            $empresa->setCnpj($row['cnpj']);
            $empresa->setRazaoSocial($row['razao_social']);

            return $empresa;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar empresa ' . $ex->getMessage());
        }
    }

    public function deletar($id) {
        $this->con->beginTransaction();
        try {
            $sql = 'delete from empresa where idempresa = :idempresa';
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idempresa', $id);
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao deletar empresa ' . $ex->getMessage());
        }
    }

    public function editar(Empresa $empresa) {
        $this->con->beginTransaction();
        try {
            $sql = 'update empresa set
                        fantasia = :fantasia,
                        cnpj = :cnpj,
                        razao_social = :razao_social
                        where idempresa = :idempresa';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':fantasia', $empresa->getFantasia());
            $stmt->bindValue(':cnpj', $empresa->getCnpj());
            $stmt->bindValue(':razao_social', $empresa->getRazaoSocial());
            $stmt->bindValue(':idempresa', $empresa->getId());
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao editar de empresa: ' . $ex->getMessage());
        }
    }

    public function inserir(Empresa $empresa) {
        $this->con->beginTransaction();
        try {
            $sql = 'insert into empresa(
                                fantasia,
                                cnpj,
                                razao_social)
                                values(
                                :fantasia,
                                :cnpj,
                                :razao_social)';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':fantasia', $empresa->getFantasia());
            $stmt->bindValue(':cnpj', $empresa->getCnpj());
            $stmt->bindValue(':razao_social', $empresa->getRazaoSocial());
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao inserir de empresa: ' . $ex->getMessage());
        }
    }

    public function listarTodos() {
        try {
            $sql = 'select idempresa, fantasia, cnpj, razao_social
                        from empresa order by idempresa';

            $stmt = $this->con->prepare($sql);
            $stmt->execute();

            $empresas = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $empresa = new Empresa();
                $empresa->setId($row['idempresa']);
                $empresa->setFantasia($row['fantasia']);
                $empresa->setCnpj($row['cnpj']);
                $empresa->setRazaoSocial($row['razao_social']);
                $empresas[] = $empresa;
            }

            return $empresas;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar empresa ' . $ex->getMessage());
        }
    }

}

?>
