<?php
include_once '../controller/ControllerEmpresa.php';
include_once '../controller/ControllerConvenio.php';
include_once '../controller/ControllerEmpresaConvenio.php';
include_once '../controller/ControllerFuncionario.php';
include_once '../model/Filtro.php';
?>

<div class="panel panel-default ">
    <div class="panel-heading">Relatorio Funcionarios por Empresa</div>
    <div class="panel-body">
        <table class="table ">
            <tr class="active">
                <th width="50px">ID</th>
                <th width="300px">Fantasia</th>
                <th>Funcionarios</th>
            </tr>
            <?php
            $ctrlFuncionario = new ControllerFuncionario();
            $ctrlEmpresa = new ControllerEmpresa();
            $empresas = $ctrlEmpresa->listarTodos();
            foreach ($empresas as $empresa) {
                ?>
                <tr class="success">
                    <td><?php echo $empresa->getId(); ?></td>
                    <td><?php echo $empresa->getFantasia(); ?></td>
                    <td></td>
                </tr>    

                <?php
                $filtros[] = new Filtro('idempresa', '=', $empresa->getId());
                $funcionarios = $ctrlFuncionario->buscarComFiltro($filtros);
                foreach ($funcionarios as $funcionario) {
                    ?>
                <tr>
                    <td colspan="2"></td>
                    <td><?php echo $funcionario->getNome();?></td>
                </tr>
                    <?php
                }
                ?>

                <?php
            }
            ?>

        </table>
    </div>
</div>