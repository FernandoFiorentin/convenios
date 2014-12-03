<?php
include_once '../controller/ControllerFuncionario.php';
include_once '../controller/ControllerEmpresa.php';
include_once '../model/Filtro.php';

$nome = '';
$email = '';
$telefone = '';
$idEmpresa = '';

if (isset($_POST['acao']) and $_POST['acao'] == 'filtrar') {
    //print_r($_POST);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $idEmpresa = $_POST['empresa'];
}
?>
<div class="panel panel-default ">
    <div class="panel-heading">Relatorio Funcionarios</div>
    <div class="panel-body">
        <!-- Painel Filtros -->
        <div class="panel panel-default ">
            <div class="panel-heading">Filtros</div>
            <div class="panel-body">
                <form role="form" class="col-md-12" method="post" action="">

                    <div class="form-group col-md-3">
                        <input type="hidden" name="acao" value="filtrar">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $nome;?>" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $email;?>" placeholder="Email">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $telefone;?>" placeholder="Telefone">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="empresa">Empresa</label>
                        <select name="empresa" id="empresa" class="form-control">
                            <option value="0"><option>
                                <?php
                                $ctrlEmpresa = new ControllerEmpresa();
                                $empresas = $ctrlEmpresa->listarTodos();
                                foreach ($empresas as $empresa) {
                                    $selecionado = '';
                                    if($empresa->getId() == $idEmpresa){
                                        $selecionado = 'selected';
                                    }
                                    ?>
                                <option value='<?php echo $empresa->getId(); ?>' <?php echo $selecionado; ?> ><?php echo $empresa->getFantasia(); ?></option>
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

        <table class="table table-bordered table-striped">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Empresa</th> 
            </tr>
            <?php
            $ctrlEmpresa = new ControllerEmpresa();
            $ctrlFuncionario = new ControllerFuncionario();

            $filtros = array();
            if($nome){
                $filtros[] = new Filtro('nome', 'like', $nome);
            }
            if($email){
                $filtros[] = new Filtro('email', 'like', $email);
            }
            if($telefone){
                $filtros[] = new Filtro('telefone', 'like', $telefone);
            }
            if($idEmpresa){
                $filtros[] = new Filtro('idempresa','=',$idEmpresa);
            }
            
            $funcionarios = $ctrlFuncionario->buscarComFiltro($filtros);

            foreach ($funcionarios as $funcionario) {
                $empresa = $ctrlEmpresa->buscarPorId($funcionario->getIdEmpresa());
                ?>
                <tr>
                    <td><?php echo $funcionario->getNome(); ?></td>
                    <td><?php echo $funcionario->getEmail(); ?></td>
                    <td><?php echo $funcionario->getTelefone(); ?></td>
                    <td><?php echo $empresa->getFantasia(); ?></td>
                </tr>    
                <?php
            }
            ?>

        </table>

    </div>
</div>