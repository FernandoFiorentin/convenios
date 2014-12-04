<?php
include_once '../controller/ControllerEmpresa.php';
include_once '../controller/ControllerConvenio.php';
include_once '../controller/ControllerEmpresaConvenio.php';
include_once '../controller/ControllerFuncionario.php';
include_once '../model/Filtro.php';

$idConvenio = 0;
if (isset($_POST['acao']) and $_POST['acao'] == 'filtrar') {
    if (isset($_POST['convenio'])) {
        $idConvenio = $_POST['convenio'];
    } else {
        $idConvenio = 0;
    }
}
?>

<div class="panel panel-default ">
    <div class="panel-heading">Relatorio Funcionarios por Convenio</div>
    <div class="panel-body">
        <!-- Painel Filtros -->
        <div class="panel panel-default ">
            <div class="panel-heading">Filtros</div>
            <div class="panel-body">
                <form role="form" class="col-md-12" method="post" action="">                    
                    <div class="form-group col-md-2">
                        <input type="hidden" name="acao" value="filtrar">
                        <label for="empresa">Convenio</label>
                        <select name="convenio" id="empresa" class="form-control">  
                            <option value="o"></option>>
                            <?php
                            $ctrlConvenio = new ControllerConvenio();
                            $convenios = $ctrlConvenio->listarTodos();
                            foreach ($convenios as $convenio) {
                                $selecionado = '';
                                if ($convenio->getId() == $idConvenio) {
                                    $selecionado = 'selected';
                                }
                                ?>
                                <option value='<?php echo $convenio->getId(); ?>' <?php echo $selecionado; ?> ><?php echo $convenio->getNome(); ?></option>
                                <?php
                            }
                            ?>
                        </select>                            
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default">Filtrar</button>
                    </div>
                </form>  
            </div>
        </div>
        <!-- Fim Painel Filtros -->

        <table class="table ">
            <tr class="info">
                <th width="300px">Convenio</th>
                <th>Funcionario</th>
                <th>Empresa</th>
            </tr>
            <?php
            $ctrlEmpresa = new ControllerEmpresa();
            $ctrlConvenio = new ControllerConvenio();
            $ctrlFuncionario = new ControllerFuncionario();
            $ctrlEmpConv = new ControllerEmpresaConvenio();

            if ($idConvenio > 0) {
                $listEmpConv = $ctrlEmpConv->buscarPorIdConvenio($idConvenio);
            } else {
                $listEmpConv = $ctrlEmpConv->listarTodos();
            }
           
            $convenioAnterior = 0;
            foreach ($listEmpConv as $empConv) {
                $convenio = $ctrlConvenio->buscarPorId($empConv->getIdConvenio());
                if ($convenio->getId() != $convenioAnterior) {
                    $convenioAnterior = $convenio->getId();
                    ?>
                    <tr class="active">
                        <td><?php echo $convenio->getNome(); ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                }
                $empresa = $ctrlEmpresa->buscarPorId($empConv->getIdEmpresa());
                $filtros[] = new Filtro('idempresa', '=', $empresa->getId());
                $funcionarios = $ctrlFuncionario->buscarComFiltro($filtros);
                foreach ($funcionarios as $funcionario) {
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $funcionario->getNome(); ?></td>
                        <td><?php echo $empresa->getFantasia(); ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>
    </div>
</div>