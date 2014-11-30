<?php

include_once './ControllerEpresa.php';


if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
} elseif ($_GET['acao']) {
    $acao = $_GET['acao'];
}

$ctrlEmpresa = new ControllerEmpresa();

if ($acao == 'inserir') {
    $empresa = new Empresa();
    $empresa->setId($_POST['id']);
    $empresa->setFantasia($_POST['fantasia']);
    $empresa->setCnpj($_POST['cnpj']);
    $empresa->setRazaoSocial($_POST['razao']);
    $ctrlEmpresa->inserir($empresa);
} elseif ($acao == 'editar') {
    $empresa = new Empresa();
    $empresa->setId($_POST['id']);
    $empresa->setFantasia($_POST['fantasia']);
    $empresa->setCnpj($_POST['cnpj']);
    $empresa->setRazaoSocial($_POST['razao']);
    $ctrlEmpresa->editar($empresa);
} elseif ($acao == 'excluir') {
    $idEmpresa = $_GET['id'];
    $ctrlEmpresa->deletar($idEmpresa);
}

header('location: ../view/FrmEmpresa.php');
?>