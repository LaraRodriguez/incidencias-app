/*drop database if exists  incidencias;
create database incidencias;
use incidencias;
CREATE TABLE incidencia(
 numero tinyint(3) unsigned not null auto_increment primary key,
 urgencia varchar(80) not null,
 tipo varchar(80) not null,
 fechahora varchar(80) not null,
 lugar varchar(80) not null,
 ip varchar(80) not null,
 descripcion varchar(120)
)CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO incidencia(numero, urgencia, tipo, fechahora, lugar, ip, descripcion)
VALUES
(1,"Si","Vandalismo","25-10-2020 10:37:43","Plaza mayor","193.12.56.25","Farola rota"),
(2,"Si","Basuras","26-10-2020 12:07:23","C/Pelicano 25","131.120.121.125","Contenedor basura roto");
*/
DROP DATABASE IF EXISTS Incidencias;
CREATE DATABASE Incidencias;
Use Incidencias;

CREATE TABLE Tipo_Incidencia(
Id_tipo int unsigned auto_increment primary key,
Tipo varchar(16) not null);

INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Pavimentacion');
INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Fuga');
INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Jardineria');
INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Generico');

CREATE TABLE Incidencia(
Num_incidencia int unsigned auto_increment primary key,
Urgencia boolean default 0,
Id_tipo int unsigned,
Fecha datetime,
Lugar varchar(60),
Ip varchar(16),
Descripcion Text,
Arreglada boolean default 0,
FOREIGN KEY (Id_tipo) 
        REFERENCES Tipo_Incidencia(Id_tipo)
        ON DELETE CASCADE
 );
