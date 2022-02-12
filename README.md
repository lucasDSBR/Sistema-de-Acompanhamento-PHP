# Sistema-de-Acompanhamento-PHP

## Criando tabela de Usuários:
```
CREATE TABLE IF NOT EXISTS `usuarios` (
      `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `nome` VARCHAR( 50 ) NOT NULL ,
      `senha` VARCHAR( 40 ) NOT NULL ,
      `email` VARCHAR( 100 ) NOT NULL ,
      `nivel` INT(1) UNSIGNED NOT NULL DEFAULT '1',
      `ativo` BIT NOT NULL DEFAULT 0,
      `data_cadastro` DATETIME NOT NULL,
      `cpf` VARCHAR( 100 ) NOT NULL ,
      `ics` VARCHAR( 100 ) NOT NULL ,
      `matricula` VARCHAR( 100 ) NOT NULL ,
      `comprovante` VARCHAR( 100 ) NOT NULL ,
      `finalidade` VARCHAR( 100 ) NOT NULL ,
      PRIMARY KEY (`id`),
      UNIQUE KEY `cpf` (`cpf`),
      KEY `nivel` (`nivel`)
  ) ENGINE=MyISAM ;
```
## Criando tabela de Acompanhamentos:
```
CREATE TABLE IF NOT EXISTS `acompanhamentos` (
      `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `id_usuario_envio` INT(11) NOT NULL ,
      `id_usuario_analise` INT(11) NOT NULL ,
      `data_envio` DATETIME NOT NULL ,
      `data_analise` DATETIME,
      `pedente` BIT NOT NULL DEFAULT 1,
      `tipoServico` BIT NOT NULL DEFAULT 0,
      `tipoRevisao` BIT NOT NULL DEFAULT 0,
      `tipoTraducao` BIT NOT NULL DEFAULT 0,
      `nomeColabs` VARCHAR( 5000 ),
      `periodicoOrEvento` BIT NOT NULL DEFAULT 0,
      `nomePeriodicoOrEvento` VARCHAR( 200 ),
      `justificativaPedido` VARCHAR( 200 ),
      `paginas` VARCHAR( 100 ),
      `pathArquivo` VARCHAR( 200 ),
      `pathResultado` VARCHAR( 200 ),
      PRIMARY KEY (`id`),
      UNIQUE KEY `id` (`id`)
  ) ENGINE=MyISAM ;
```
## Inserindo usuarios na tabela Usuários:
```
"INSERT INTO usuarios VALUES (NULL, 'Nome', SHA1('senha'), 'email', 'nivel', 'ativo 1 ou 0', NOW( ), 'cpf', 'tipoVinculo', 'matricula', 'tragetoriaComprovante', 'finalidade');";
```
## Inserindo usuarios na tabela Acompanhamentos:
```
INSERT INTO `acompanhamentos` VALUES (NULL, 3, 1, NOW( ), NOW( ), 0, 1, 0, 1, 0, "base64/saasfdsadsgawokfewopamfesm", "");
```
