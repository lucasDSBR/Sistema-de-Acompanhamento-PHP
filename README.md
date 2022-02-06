# Sistema-de-Acompanhamento-PHP

## Criando tabela de Usuários:

CREATE TABLE IF NOT EXISTS `usuarios` (
      `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `nome` VARCHAR( 50 ) NOT NULL ,
      `usuario` VARCHAR( 25 ) NOT NULL ,
      `senha` VARCHAR( 40 ) NOT NULL ,
      `email` VARCHAR( 100 ) NOT NULL ,
      `nivel` INT(1) UNSIGNED NOT NULL DEFAULT '1',
      `ativo` BOOL NOT NULL DEFAULT '1',
      `cadastro` DATETIME NOT NULL ,
      PRIMARY KEY (`id`),
      UNIQUE KEY `usuario` (`usuario`),
      KEY `nivel` (`nivel`)
  ) ENGINE=MyISAM ;
## Criando tabela de Acompanhamentos:

CREATE TABLE IF NOT EXISTS `acompanhamentos` (
      `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `id_usuario_envio` INT(11) NOT NULL ,
      `id_usuario_analise` INT(11) NOT NULL ,
      `data_envio` DATETIME NOT NULL ,
      `data_analise` DATETIME,
      `pedente` BIT NOT NULL DEFAULT 1,
      `traducao` BIT NOT NULL DEFAULT 0,
      `revisao` BIT NOT NULL DEFAULT 0,
      `tipo_traducao` BIT NOT NULL DEFAULT 0,
      `tipo_revisao` BIT NOT NULL DEFAULT 0,
      `arquivo` VARCHAR( 10000 ),
      `resultado` VARCHAR( 10000 ),
      PRIMARY KEY (`id`),
      UNIQUE KEY `id` (`id`)
  ) ENGINE=MyISAM ;

## Inserindo usuarios na tabela Usuários:

INSERT INTO `usuarios` VALUES (NULL, 'Usuário Teste', 'demo', SHA1( 'demo'), 'usuario@demo.com.br', 1, NOW( ));
INSERT INTO `usuarios` VALUES (NULL, 'Administrador Teste', 'admin', SHA1('admin' ), 'admin@demo.com.br' 2, 1, NOW( ));

## Inserindo usuarios na tabela Acompanhamentos:

INSERT INTO `acompanhamentos` VALUES (NULL, 3, 1, NOW( ), NOW( ), 0, 1, 0, 1, 0, "base64/saasfdsadsgawokfewopamfesm", "");