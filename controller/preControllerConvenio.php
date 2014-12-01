<?php

include_once './ControllerConvenio.php';


if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
} elseif ($_GET['acao']) {
    $acao = $_GET['acao'];
}

$ctrlConvenio = new ControllerConvenio();

if ($acao == 'inserir') {
    $convenio = new Convenio();
    $convenio->setNome($_POST['nome']);
    $ctrlConvenio->inserir($convenio);
} elseif ($acao == 'editar') {
    $convenio = new Convenio();
    $convenio->setId($_POST['id']);
    $convenio->setNome($_POST['nome']);
    $ctrlConvenio->editar($convenio);
} elseif ($acao == 'excluir') {
    $idConvenio = $_GET['id'];
    $ctrlConvenio->deletar($idConvenio);
}

header('location: ../view/FrmConvenio.php');
?>