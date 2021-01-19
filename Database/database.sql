CREATE DATABASE IF NOT EXISTS classificadoss;

USE classificados;

CREATE TABLE IF NOT EXISTS usuarios (
	id integer(11) not null AUTO_INCREMENT PRIMARY KEY,
	nome varchar(100) not null,
	email varchar(100) not null,
	senha varchar(100) not null,
	telefone varchar(100) not null
);

CREATE TABLE IF NOT EXISTS anuncios (
	id integer(11) not null AUTO_INCREMENT PRIMARY KEY,
	primeira_imagem varchar(100) not null,
	segunda_imagem varchar(100) not null,
	terceira_imagem varchar(100) not null,
	video_demonstracao varchar(100) null,
	email_usuario varchar(100) not null,
	id_categoria integer(11) not null REFERENCES categorias (id),
	titulo varchar(100) not null,
	descricao text,
	valor varchar(100) not null,
	estado varchar(100) not null
);

CREATE TABLE IF NOT EXISTS categorias (
	id integer(11) not null AUTO_INCREMENT PRIMARY KEY,
	nome varchar(100) not null
);