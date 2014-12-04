<?php

$arquivoAtual = $_SERVER['PHP_SELF'];

$menuAtivo = null;
$menuAtivo['empresa'] = '';
$menuAtivo['funcnionario'] = '';
$menuAtivo['convenio'] = '';

if ($arquivoAtual == '/convenios/view/FrmEmpresa.php') {
    $menuAtivo['empresa'] = 'active';
} elseif ($arquivoAtual == '/convenios/view/FrmFuncionario.php') {
    $menuAtivo['funcionario'] = 'active';
} elseif ($arquivoAtual == '/convenios/view/FrmConvenio.php') {
    $menuAtivo['convenio'] = 'active';
}elseif ($arquivoAtual == '/convenios/view/Relatorios.php') {
    $menuAtivo['relatorios'] = 'active';
}
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">Convenios</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo $menuAtivo['empresa'] ?>"><a href="FrmEmpresa.php">Empresas</a></li>
                <li class="<?php echo $menuAtivo['funcionario'] ?>"><a href="FrmFuncionario.php">Funcionarios</a></li>
                <li class="<?php echo $menuAtivo['convenio'] ?>"><a href="FrmConvenio.php">Convenios</a></li>                
                <li class="<?php echo $menuAtivo['relatorios'] ?>"><a href="Relatorios.php">Relatorios</a></li>                
            </ul>            
        </div><!--/.nav-collapse -->
    </div>
</nav>