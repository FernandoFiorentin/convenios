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
        include_once '../model/TipoRelatorio.php';
        include_once 'menu.php';
        ?>

        <div class="container">
            <button class="btn btn-default" onclick="window.location.href = 'Relatorios.php?tipo_relatorio=<?php echo TipoRelatorio::Funcionarios; ?>'"> Relatorio Funcionarios Ordem Alfabetica</button>
            <button class="btn btn-default" onclick="window.location.href = 'Relatorios.php?tipo_relatorio=<?php echo TipoRelatorio::FuncionariosPorEmpresa; ?>'"> Relatorio Funcionarios Por Empresa</button>
            <button class="btn btn-default" onclick="window.location.href = 'Relatorios.php?tipo_relatorio=<?php echo TipoRelatorio::FuncionariosPorConvenio; ?>'"> Relatorio Funcionarios Por Convenio</button>
<hr>
            <?php
            if (isset($_GET['tipo_relatorio'])) {
                $tipoRelatorio = $_GET['tipo_relatorio'];

                if ($tipoRelatorio == TipoRelatorio::Funcionarios) {
                    include_once 'RelatorioFuncionarios.php';
                } elseif ($tipoRelatorio == TipoRelatorio::FuncionariosPorEmpresa) {
                    include_once 'RelatorioFuncionarioEmpresa.php';
                } elseif ($tipoRelatorio == TipoRelatorio::FuncionariosPorConvenio) {
                    include_once 'RelatorioFuncionarioConvenio.php';
                }
            }
            ?>
        </div> <!--/container -->

        <script src = "../js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./index_files/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>