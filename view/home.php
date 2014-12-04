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

        <div class="container">
            <div class="jumbotron">
                <h3>FTEC - Projeto de Sistemas para WEB</h3>

                <p>
                    Trabalho: Convênios <br>
                    Dupla: Carlos e Fernando<br>
                </p>
                <p>
                <ol>
                    <li>Cadastros
                        <ul>
                            <li>- Empresas (nome fantasia, CNPJ e razão social).</li>
                            <li>- Funcionários (nome, e-mail, telefone e empresa).</li>
                            <li>- Convênios (nome).</li>
                            <li>- Empresa_convenio(idempresa, idconvenio)</li>
                        </ul>
                    </li>

                    <li>Relatorios
                        <ul>
                            <li>Relatório de funcionários por ordem alfabética (fantasia):
                                <ul>
                                    <li> Mostrar nome, e-mail, telefone e clube de todos os funcionários com possibilidade de filtro (busca) pelos 4 campos;</li>
                                </ul>
                            </li>

                            <li>Relatório de funcionários por empresa:
                                <ul>
                                    <li> Construir uma visualização onde exiba o nome fantasia da empresa e abaixo seus funcionários;</li>
                                    <li> O relatório só deve mostrar a próxima empresa após escrever o nome de todos os funcionários da empresa em exibição;</li>
                                </ul>
                            </li>

                            <li>Relatório de funcionários por convênio:
                                <ul>
                                    <li> Filtrar o convênio e mostrar nome e empresa dos funcionários resultantes da seleção;</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ol>
                </p>               

            </div>        
        </div> <!-- /container -->

        <script src="../js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./index_files/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>