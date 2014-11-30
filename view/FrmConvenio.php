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

        include_once '../controller/ControllerConvenio.php';

        $acao = 'inserir';
        if (isset($_GET['acao'])) {
            $acao = $_GET['acao'];
        }
        ?>

        <div class="container">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <form role="form" class="col-md-4">
                        <div class="form-group">
                            <input type="hidden" name="acao" value="<?php echo $acao; ?>">
                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="ID"  >
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control"  placeholder="CNPJ">
                        </div>

                        <button type="button" class="btn btn-default" onclick="window.location.href = 'FrmEmpresa.php'">Novo</button>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="submit" class="btn btn-default">Excluir</button>
                    </form>  
                </div>
            </div> 

            <div class="panel panel-default">
                <div class="panel-heading">Lista de empresas</div>
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
                        $ctrlEmpresa = new ControllerEmpresa();
                        $funcionarios = $ctrlEmpresa->listarTodos();
                        foreach ($funcionarios as $funcionario) {
                            ?>
                            <tr>
                                <td><?php echo $funcionario->getId(); ?></td>
                                <td><?php echo $funcionario->getFantasia(); ?></td>
                                <td><?php echo $funcionario->getCnpj(); ?></td>
                                <td><?php echo $funcionario->getRazaoSocial(); ?></td>
                                <td><a href="../controller/preControllerEmpresa.php?acao=editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a></td>
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