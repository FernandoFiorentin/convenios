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

        include_once '../controller/ControllerFuncionario.php';
        include_once '../controller/ControllerEmpresa.php';

        $ctrlFuncionario = new ControllerFuncionario();
        
        $acao = 'inserir';
        $funcionario = new Funcionario();
        if (isset($_GET['acao'])) {
            $acao = $_GET['acao'];

            if ($acao == 'editar') {
                $idFuncionario = $_GET['id'];
                $funcionario = $ctrlFuncionario->buscarPorId($idFuncionario);
            }
        }
        ?>

        <div class="container">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <form role="form" class="col-md-4" method="post" action="../controller/preControllerFuncionario.php">
                        <div class="form-group">
                            <input type="hidden" name="acao" value="<?php echo $acao; ?>">
                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control" value="<?php echo $funcionario->getId();?>" placeholder="ID" >
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $funcionario->getNome();?>" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $funcionario->getEmail();?>" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $funcionario->getTelefone();?>" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <select name="empresa" id="empresa" class="form-control">
                                <option value="-1"><option>
                                <?php
                                $ctrlEmpresa = new ControllerEmpresa();
                                $empresas = $ctrlEmpresa->listarTodos();
                                foreach ($empresas as $empresa) {
                                    $selecionado = '';
                                    if($funcionario->getIdEmpresa() == $empresa->getId()){
                                        $selecionado = 'selected';
                                    }
                                    ?>
                                <option value='<?php echo $empresa->getId(); ?>' <?php echo $selecionado;?> ><?php echo $empresa->getFantasia(); ?></option>
                                    <?php
                                }
                                ?>
                            </select>                            
                        </div>
                        <button type="button" class="btn btn-default" onclick="window.location.href = 'FrmFuncionario.php'">Novo</button>
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Empresa</th> 
                        </tr>
                        <?php
                        
                        $ctrlEmpresa = new ControllerEmpresa();

                        $funcionarios = $ctrlFuncionario->listarTodos();

                        foreach ($funcionarios as $funcionario) {
                            $empresa = $ctrlEmpresa->buscarPorId($funcionario->getIdEmpresa());
                            ?>
                            <tr>
                                <td><?php echo $funcionario->getId(); ?></td>
                                <td><?php echo $funcionario->getNome(); ?></td>
                                <td><?php echo $funcionario->getEmail(); ?></td>
                                <td><?php echo $funcionario->getTelefone(); ?></td>
                                <td><?php echo $empresa->getFantasia(); ?></td>
                                <td><a href="FrmFuncionario.php?acao=editar&id=<?php echo $funcionario->getId()?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a></td>
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