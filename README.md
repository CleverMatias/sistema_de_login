# Sistema de login em PHP

### Esse sistema tem por finalidade testar meus conhecimentos e confrontá-los com novos recursos, funcões ou metodos de terceiros, visando manter minha mente ocupada com a programação e também reter novos conhecimentos, afinal, sabemos que *todos os dias estão sendo aprimoradas as técnicas* e muitas melhorias nos padrões de desenvolvimento.

>## Fique a vontade para melhar esse sistema. Segue abaixo dicas de configuração.

>## Configuração:

>### 1. instalar cadastro_pessoas.sql
	CREATE DATABASE  IF NOT EXISTS `cadastro`;
	USE `cadastro`;


	DROP TABLE IF EXISTS `pessoas`;

	CREATE TABLE `pessoas` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `nome` varchar(255) NOT NULL,
	  `sobrenome` varchar(255) NOT NULL,
	  `email` varchar(255) NOT NULL,
	  `senha` varchar(255) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


>### 2. alterar configurações para a conexão  em config.php

	define('HOST', '127.0.0.1');
	define('USER', 'root');
	define('SENHA', '');
	define('BASE', 'cadastro');