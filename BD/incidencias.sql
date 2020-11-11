DROP DATABASE IF EXISTS incidencias;
CREATE DATABASE incidencias;
Use incidencias;

CREATE TABLE Tipo_Incidencia(
Id_tipo int unsigned auto_increment primary key,
Tipo varchar(16) not null);

INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Pavimentacion');
INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Fuga');
INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Jardineria');
INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Generico');
INSERT INTO Tipo_Incidencia (Tipo) VALUES ('Vandalismo');

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
 INSERT INTO Incidencia value
 (1,1,5,"2020-11-04 10:37:43","Plaza mayor","193.12.56.25","Farola rota",0),
 (2,1,4,"2020-11-04 12:07:23","C/Pelicano 25","131.120.121.125","Contenedor basura roto",0),
 (3,1,5,"2020-11-04 00:07:23","C/Cigueña 5","145.10.11.15","Banco roto",0);

CREATE TABLE  usuarios_login(
        usuario varchar(30) PRIMARY KEY,
        pass varchar(40)
);
INSERT INTO usuarios_login VALUE
('juan', SHA1('juan')),
('ana', SHA1('ana')),
('profesor', SHA1('profesor')),
('jose', SHA1('jose'))