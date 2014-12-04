CREATE TABLE `convenios` (
  `idconvenio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`idconvenio`),
  KEY `fk_funcionario_has_empresa_funcionario_idx` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `fantasia` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `razao_social` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `idempresa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE `empresa_convenio` (
  `id_empresa_convenio` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) NOT NULL,
  `idconvenio` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa_convenio`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

