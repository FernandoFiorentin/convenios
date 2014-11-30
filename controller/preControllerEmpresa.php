<?php
include_once './ControllerEpresa.php';

echo '<pre>';
print_r($_POST);
echo '<pre>';

if (isset($_POST['acao'])){
    $acao = $_POST['acao'];
}

$ctrlEmpresa = new ControllerEmpresa();
if ($acao == 'inserir'){
    $empresa = new Empresa();
    $empresa->setId($_POST['id']);
    $empresa->setFantasia($_POST['fantasia']);
    $empresa->setCnpj($_POST['cnpj']);
    $empresa->setRazaoSocial($_POST['razao']);
    $ctrlEmpresa->inserir($empresa);
}

header('location: ../view/FrmEmpresa.php');
?>