<?php

include_once './ControllerEmpresaConvenio.php';

echo '<pre> ';
echo 'post<br>';
print_r($_POST);

echo 'post<br>';
print_r($_GET);
echo '</pre>';

//exit();

if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
} elseif ($_GET['acao']) {
    $acao = $_GET['acao'];
}

$ctrlEmpresaConvenio = new ControllerEmpresaConvenio();

if ($acao == 'inserir') {
    $idEmpresa = $_POST['idempresa'];
    $idConvenio = $_POST['idconvenio'];
    
    $empConv = new EmpresaConvenio();
    $empConv->setIdEmpresa($idEmpresa);
    $empConv->setIdConvenio($idConvenio);
    $ctrlEmpresaConvenio->inserir($empConv);
} elseif ($acao == 'editar') {
    $empConv = new EmpresaConvenio();
    $empConv->setIdEmpresa($_POST['idempresa']);
    $empConv->setIdConvenio($_POST['idconvenio']);
    $ctrlEmpresaConvenio->editar($empConv);
} elseif ($acao == 'excluir') {
    $idEmpConv = $_GET['id'];
    $empConv = $ctrlEmpresaConvenio->buscarPorId($idEmpConv);
    $idEmpresa = $empConv->getIdEmpresa();
    $idConvenio = $empConv->getIdConvenio();
    $ctrlEmpresaConvenio->deletar($idEmpConv);
}

header('location: ../view/FrmEmpresa.php?acao=editar&id='.$idEmpresa.'&convenio='.$idConvenio);
?>