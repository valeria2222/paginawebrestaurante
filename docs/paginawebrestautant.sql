-- Active: 1703123798280@@127.0.0.1@3306@paginawebrestaurant
create database paginawebrestaurant;
use paginawebrestaurant;

create table perfil(
    idPerfil int not null auto_increment,
    nombre varchar(45) not null,
    nivel int unique key not null,
    constraint pk_idPerfil primary key(idPerfil)
);

create table usuario(
    idUsuario int not null auto_increment,
    nombre varchar(45) not null,
    apellido varchar(45) not null,
    correo varchar(100) unique key not null,
    username varchar(45) not null,
    contrasena varchar(255) not null,
    idPerfil int not null,
    constraint pk_idUsuario primary key(idUsuario),
    constraint fk_idPerfil foreign key(idPerfil) references perfil(idPerfil)
);



insert into perfil(nombre, nivel) values('Administrador', 1);
insert into perfil(nombre, nivel) values('Cliente', 2);
insert into perfil(nombre, nivel) values('Bodega', 3);
insert into perfil(nombre, nivel) values('Finanzas', 4);
insert into perfil(nombre, nivel) values('Cocina', 5);


insert into usuario(nombre, apellido, correo, username, contrasena, idPerfil) 
    values('Valeria', 'Pozo', 'valeria.pozo@gmail.com', 'valeria.pozo', md5('v.pozo'), 1);
insert into usuario(nombre, apellido, correo, username, contrasena, idPerfil) 
    values('Maria', 'Soledad', 'maria.soledad@gmail.com', 'maria.soledad', md5('m.soledad'), 2);
