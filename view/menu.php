<?php
if (isset($_GET['menu'])) {

    $menuAtivo = null;
    $menuAtivo['empresa'] = '';
    $menuAtivo['funcnionario'] = '';
    $menuAtivo['convenio'] = '';
    if ($_GET['menu'] == 'empresa') {
        $menuAtivo['empresa'] = 'active';
    } elseif ($_GET['menu'] == 'funcionario') {
        $menuAtivo['funcionario'] = 'active';
    } elseif ($_GET['menu'] == 'convenio') {
        $menuAtivo['convenio'] = 'active';
    }
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
            <a class="navbar-brand" href="#">Convenios</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo $menuAtivo['empresa']?>"><a href="FrmEmpresa.php?menu=empresa">Empresas</a></li>
                <li class="<?php echo $menuAtivo['funcionario']?>"><a href="FrmFuncionario.php?menu=funcionario">Funcionarios</a></li>
                <li class="<?php echo $menuAtivo['convenio']?>"><a href="FrmConvenio.php?menu=convenio">Convenios</a></li>                
            </ul>            
        </div><!--/.nav-collapse -->
    </div>
</nav>