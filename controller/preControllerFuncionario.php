<?php

include_once './ControllerFuncionario.php';


if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
} elseif ($_GET['acao']) {
    $acao = $_GET['acao'];
}

$ctrlFuncionario = new ControllerFuncionario();

if ($acao == 'inserir') {
    $funcionario = new Funcionario();
    $funcionario->setId($_POST['id']);
    $funcionario->setNome($_POST['nome']);
    $funcionario->setEmail($_POST['email']);
    $funcionario->setTelefone($_POST['telefone']);
    $funcionario->setIdEmpresa($_POST['empresa']);
    $ctrlFuncionario->inserir($funcionario);
} elseif ($acao == 'editar') {
    $funcionario = new Funcionario();
    $funcionario->setId($_POST['id']);
    $funcionario->setNome($_POST['nome']);
    $funcionario->setEmail($_POST['email']);
    $funcionario->setTelefone($_POST['telefone']);
    $funcionario->setIdEmpresa($_POST['empresa']);
    $ctrlFuncionario->editar($funcionario);
} elseif ($acao == 'excluir') {
    $idFuncionario = $_GET['id'];
    $ctrlFuncionario->deletar($idFuncionario);
}

header('location: ../view/FrmFuncionario.php');
?>