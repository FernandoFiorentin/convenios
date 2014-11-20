<?php
include_once './model/Empresa.php';
include_once './model/EmpresaDao.php';

$empresa = new Empresa();
$empresa->setId(3);
$empresa->setFantasia('teste editado');
$empresa->setCnpj('cnpj editado');
$empresa->setRazaoSocial('razao editada');
        
$empDao = new EmpresaDao();

$a = $empDao->listarTodos();
//echo $empresa->getId();
//$empDao->deletar($empresa->getId());
//$empDao->editar($empresa);
//$empDao->listarTodos();
//$empDao->inserir($empresa);
echo '<pre>';
print_r($a);
echo '</pre>';
