<?php
include_once './model/Empresa.php';
include_once './model/EmpresaDao.php';

$empresa = new Empresa();
$empDao = new EmpresaDao();

$empDao->buscarPorId(1);
$empDao->deletar(1);
$empDao->editar($empresa);
$empDao->listarTodos();
$empDao->inserir($empresa);
