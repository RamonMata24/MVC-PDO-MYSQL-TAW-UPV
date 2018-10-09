create database mvc_crud;
use mvc_crud;

create table usuarios(
id int(10) not null auto_increment,
usuario varchar(200) not null ,
password varchar(200) not null,
email varchar(200) not null,
Primary key (id));

insert into usuarios VALUES (1,'admin','admin','admin@gmail.com');



select * from usuarios;