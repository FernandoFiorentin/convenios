<!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/navbar-static-top/ -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Convenios</title>
        <!-- Bootstrap core CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="./index_files/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Static navbar -->
        <?php
        include_once 'menu.php';
        include_once '../controller/ControllerEmpresa.php';
        include_once '../controller/ControllerConvenio.php';
        include_once '../controller/ControllerEmpresaConvenio.php';

        $ctrlEmpresa = new ControllerEmpresa();

        $acao = 'inserir';
        $empresa = new Empresa();
        if (isset($_GET['acao'])) {
            $acao = $_GET['acao'];

            if ($acao == 'editar') {
                $idEmpresa = $_GET['id'];
                $empresa = $ctrlEmpresa->buscarPorId($idEmpresa);
            }
        }
        ?>

        <div class="container ">
            <div class="panel panel-default ">
                <div class="panel-heading">Formulario</div>
                <div class="panel-body">
                    <!-- Formulario Empresa -->
                    <form role="form" class="col-md-4" action="../controller/preControllerEmpresa.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="acao" value="<?php echo $acao; ?>">
                            <label for="id">Id</label>                            
                            <input type="text" name="id" id="id" class="form-control" value="<?php echo $empresa->getId() ?>" placeholder="ID" >
                        </div>
                        <div class="form-group">
                            <label for="fantasia">Nome Fantasia</label>
                            <input type="text" name="fantasia" id="fantasia" class="form-control" value="<?php echo $empresa->getFantasia() ?>"  placeholder="Nome Fantasia" >
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" class="form-control" value="<?php echo $empresa->getCnpj() ?>"  placeholder="CNPJ">
                        </div>
                        <div class="form-group">
                            <label for="razao">Razão Social</label>
                            <input type="text" name="razao" id="razao" class="form-control" value="<?php echo $empresa->getRazaoSocial() ?>"  placeholder="Razão Social">
                        </div>
                        <button type="button" class="btn btn-default" onclick="window.location.href = 'FrmEmpresa.php'">Novo</button>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="button" class="btn btn-default" onclick="window.location.href = '../controller/preControllerEmpresa.php?acao=excluir&id=<?php echo $empresa->getId() ?>'">Excluir</button>
                    </form>  
                    <!-- Fim Formulario Empresa -->

                    <?php
                    if ($acao == 'editar') {
                        ?>
                        <!-- convenios da empresa -->
                        <div class="container col-md-8">
                            <div class="panel panel-default ">
                                <div class="panel-heading">Convenios desta Empresa</div>
                                <div class="panel-body">
                                    <form method="post" action="../controller/preControllerEmpresaConvenio.php">
                                        <input type="hidden" name="acao" value="inserir">
                                        <input type="hidden" name="idempresa" value="<?php echo $empresa->getId(); ?>">
                                        <select class="form-control" name="idconvenio">
                                            <option value="-1"></option>
                                            <?php
                                            $ctrlConvenio = new ControllerConvenio();
                                            $convenios = $ctrlConvenio->listarTodos();
                                            foreach ($convenios as $convenio) {
                                                ?>
                                                <option value="<?php echo $convenio->getId(); ?>"> <?php echo $convenio->getNome() ?> </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="submit" class="btn btn-default" value="Adicionar Convenio">
                                    </form>
                                    <hr>
                                    <table class="table table-bordered table-striped table-condensed">
                                        <tr>
                                            <th width="100px" class="text-center">Id Conv./Emp.</th>
                                            <th>Convenio</th>
                                            <th width="100px" class="text-center">Remover</th>
                                        </tr>
                                        <?php
                                        $ctrlEmpConv = new ControllerEmpresaConvenio();
                                        $empresaConvenios = $ctrlEmpConv->buscarPorIdEmpresa($empresa->getId());
                                        //$ctrlConvenio = new ControllerConvenio();
                                        foreach ($empresaConvenios as $empresaConvenio) {
                                            $convenio = $ctrlConvenio->buscarPorId($empresaConvenio->getIdConvenio());
                                            ?>
                                            <tr>
                                                <td><?php echo $empresaConvenio->getId(); ?></td>
                                                <td><?php echo $convenio->getNome(); ?></td>
                                                <td><a href="../controller/preControllerEmpresaConvenio.php?acao=excluir&id=<?php echo $empresaConvenio->getId();?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remover</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- fim convenios da empresa -->
                        <?php
                    }
                    ?>
                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">Lista de Empresas</div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Fantasia</th>
                            <th>CNPJ</th>
                            <th>Razao Social</th>
                            <th>Editar</th> 
                        </tr>
                        <?php
                        $empresas = $ctrlEmpresa->listarTodos();
                        foreach ($empresas as $empresa) {
                            ?>
                            <tr>
                                <td><?php echo $empresa->getId(); ?></td>
                                <td><?php echo $empresa->getFantasia(); ?></td>
                                <td><?php echo $empresa->getCnpj(); ?></td>
                                <td><?php echo $empresa->getRazaoSocial(); ?></td>
                                <td><a href="FrmEmpresa.php?acao=editar&id=<?php echo $empresa->getId(); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a></td>
                            </tr>    
                            <?php
                        }
                        ?>

                    </table>
                </div>
            </div>

        </div> <!-- /container -->

        <script src="../js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./index_files/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>