drop database if exists  incidencias;
create database incidencias;
use incidencias;
CREATE TABLE incidencia(
 numero tinyint(3) unsigned not null auto_increment primary key,
 urgencia varchar(80) not null,
 tipo varchar(80) not null,
 fechahora int not null,
 lugar varchar(80) not null,
 ip int not null,
 descripcion varchar(120)
)CHARSET=utf8 COLLATE=utf8_general_ci;