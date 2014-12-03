<?php

include_once 'Dao.php';
include_once 'Funcionario.php';
include_once 'Filtro.php';

class FuncionarioDao extends Dao {

    public function __construct() {
        parent::__construct();
    }

    public function buscarPorId($id) {
        try {
            $sql = 'select idfuncionario, nome, email, telefone, idempresa
                        from funcionario
                        where idfuncionario = :idfuncionario';
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idfuncionario', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $funcionario = new Funcionario();
            $funcionario->setId($row['idfuncionario']);
            $funcionario->setNome($row['nome']);
            $funcionario->setEmail($row['email']);
            $funcionario->setTelefone($row['telefone']);
            $funcionario->setIdEmpresa($row['idempresa']);

            return $funcionario;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar funcionario ' . $ex->getMessage());
        }
    }

    public function buscarComFiltro($filtros) {
        try {
            $sql = 'select idfuncionario, nome, email, telefone, idempresa
                        from funcionario where 1=1';
            
            foreach ($filtros as $filtro) {
                if ($filtro->getOperador() == 'like') {
                    $sql .= ' and ' . $filtro->getCampo() . ' like "%' . $filtro->getValor() . '%"';
                } else {
                    $sql .= ' and ' . $filtro->getCampo() . ' ' . $filtro->getOperador() . ' :' . $filtro->getCampo();
                }
            }

            $sql.= ' order by nome';

            //var_dump($sql);

            $stmt = $this->con->prepare($sql);
            foreach ($filtros as $filtro) {
                if ($filtro->getOperador() != 'like') {
                    $stmt->bindValue(':' . $filtro->getCampo(), $filtro->getValor());
                }
            }

            $stmt->execute();

            $funcionarios = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $funcionario = new Funcionario();
                $funcionario->setId($row['idfuncionario']);
                $funcionario->setNome($row['nome']);
                $funcionario->setEmail($row['email']);
                $funcionario->setTelefone($row['telefone']);
                $funcionario->setIdEmpresa($row['idempresa']);
                $funcionarios[] = $funcionario;
            }

            return $funcionarios;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar funcionarios com filtro ' . $ex->getMessage());
        }
    }

    public function deletar($id) {
        $this->con->beginTransaction();
        try {
            $sql = 'delete from funcionario where idfuncionario= :idfuncionario';
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':idfuncionario', $id);
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao deletar funcionario ' . $ex->getMessage());
        }
    }

    public function editar(Funcionario $funcionario) {
        $this->con->beginTransaction();
        try {
            $sql = 'update funcionario set
                        nome = :nome,
                        email = :email,
                        telefone = :telefone,
                        idempresa = :idempresa
                        where idfuncionario = :idfuncionario';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':nome', $funcionario->getNome());
            $stmt->bindValue(':email', $funcionario->getEmail());
            $stmt->bindValue(':telefone', $funcionario->getTelefone());
            $stmt->bindValue(':idempresa', $funcionario->getIdEmpresa());
            $stmt->bindValue(':idfuncionario', $funcionario->getId());
            echo '<pre>';
            print_r($sql);
            echo '</pre>';
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();

            throw new Exception('Erro ao editar de funcionario: ' . $ex->getMessage());
        }
    }

    public function inserir(Funcionario $funcionario) {
        $this->con->beginTransaction();
        try {
            $sql = 'insert into funcionario(
                                nome,
                                email,
                                telefone,
                                idempresa)
                                values(
                                :nome,
                                :email,
                                :telefone,
                                :idempresa)';

            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':nome', $funcionario->getNome());
            $stmt->bindValue(':email', $funcionario->getEmail());
            $stmt->bindValue(':telefone', $funcionario->getTelefone());
            $stmt->bindValue(':idempresa', $funcionario->getIdEmpresa());
            $stmt->execute();
            $this->con->commit();
            return true;
        } catch (Exception $ex) {
            $this->con->rollback();
            throw new Exception('Erro ao inserir de funcionario: ' . $ex->getMessage());
        }
    }

    public function listarTodos() {
        try {
            $sql = 'select idfuncionario, nome, email, telefone, idempresa
                        from funcionario order by idfuncionario';

            $stmt = $this->con->prepare($sql);
            $stmt->execute();

            $funcionarios = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $funcionario = new Funcionario();
                $funcionario->setId($row['idfuncionario']);
                $funcionario->setNome($row['nome']);
                $funcionario->setEmail($row['email']);
                $funcionario->setTelefone($row['telefone']);
                $funcionario->setIdEmpresa($row['idempresa']);
                $funcionarios[] = $funcionario;
            }

            return $funcionarios;
        } catch (Exception $ex) {
            throw new Exception('erro ao buscar funcionarios ' . $ex->getMessage());
        }
    }

}

?>
