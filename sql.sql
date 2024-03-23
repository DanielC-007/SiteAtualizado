create database noticia;
use noticia;
create table postagens(
idpost int not null auto_increment primary key,
titulo varchar(999) not null,
conteudo varchar(3000) not null
);