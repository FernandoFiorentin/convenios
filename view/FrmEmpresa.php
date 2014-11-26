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
        ?>

        <div class="container ">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <form role="form" class="col-md-4">
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="fantasia">Nome Fantasia</label>
                            <input type="text" name="fantasia" id="fantasia" class="form-control"  placeholder="Nome Fantasia">
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" class="form-control"  placeholder="CNPJ">
                        </div>
                        <div class="form-group">
                            <label for="razao">Razão Social</label>
                            <input type="text" name="razao" id="razao" class="form-control"  placeholder="Razão Social">
                        </div>
                        <button type="button" class="btn btn-default" onclick="window.location.href='FrmEmpresa.php?menu=empresa'">Novo</button>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="submit" class="btn btn-default">Excluir</button>
                    </form>  
                </div>
            </div>

        </div> <!-- /container -->

        <script src="../js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./index_files/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>