/**
 * bdusuarios.sql
 * Script de creación de la base de datos.
 */
/** Borra la base de datos si existe. */
drop database if exists BDUsuarios;
/** Crea la base de datos. */
create database BDUsuarios;
/** Crea el usuario para acceder a la base de datos. */
grant select,
	insert,
	update,
	delete on BDUsuarios.* to 'UBDUsuarios' @'localhost' identified by 'Lo-1234-lo';
/** Selecciona la base de datos. */
use BDUsuarios;
/** Crea la tabla Usuarios. */
create table Usuario (
	email varchar(50) NOT NULL,
	contraseña varchar(15) not null,
	nombre varchar(50) not null,
	idPartidas INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
);
/** Crea la tabla Partida. */
create table Partida (
        idPartidas INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	monedas INT not null,
	cantDanio INT not null,
	cantTrampas INT not null,
	cantCampesinos INT not null,
	cantGarroteros INT not null,
	cantEspadasCortas INT not null,
	cantEscuderos INT not null,
	cantLanceros INT not null,
	cantHachas INT not null,
	cantCaballeros INT not null,
	cantHonderos INT not null,
	cantArqueros INT not null,
	cantBallesteros INT not null,
	cantSacerdotes INT not null,
	cantMagos INT not null,
	cantCatapultas INT not null,
        FOREIGN KEY (idPartidas) REFERENCES Usuario(idPartidas) ON DELETE CASCADE on update cascade
);