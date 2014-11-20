<?php


abstract class Dao {

    protected $con;

    function __autoload($class_name) {
        include_once '/model/'.$class_name.'.php';
    }

    public function __construct() {
        $this->con = new PDO('mysql:host=localhost;dbname=convenio', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->con->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
    }

}

?>
