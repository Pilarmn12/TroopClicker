<?php

/** Incluye las clases Usuario, Tropas y Personaje. */
include '../capaNegocio/usuario.php';
include '../capaNegocio/tropas.php';
include '../capaNegocio/personaje.php';

/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();

/** @var Tropas Instancia un objeto de la clase. */
$tropaAux = new Tropas();

/** Inicializamos los datos de la partida */
$tropaAux->setIdPartidas($_SESSION['usuario']->getIdPartidas());
$tropaAux->setDaño($_POST['cantDanio']);
$tropaAux->setTrampas($_POST['cantTrampas']);
$tropaAux->setCampesinos($_POST['cantCampesinos']);
$tropaAux->setGarroteros($_POST['cantGarroteros']);
$tropaAux->setEspadasCortas($_POST['cantEspadasCortas']);
$tropaAux->setEscuderos($_POST['cantEscuderos']);
$tropaAux->setLanceros($_POST['cantLanceros']);
$tropaAux->setHachas($_POST['cantHachas']);
$tropaAux->setCaballeros($_POST['cantCaballeros']);
$tropaAux->setHonderos($_POST['cantHonderos']);
$tropaAux->setArqueros($_POST['cantArqueros']);
$tropaAux->setBallesteros($_POST['cantBallesteros']);
$tropaAux->setSacerdotes($_POST['cantSacerdotes']);
$tropaAux->setMagos($_POST['cantMagos']);
$tropaAux->setCatapultas($_POST['cantCatapultas']);

$_SESSION['tropas'] = $tropaAux;

$tropaAux->guardarPartida();

/** @var Personaje Instancia un objeto de la clase. */
$personajeAux = new Personaje();

$personajeAux->setIdPartidas($_SESSION['usuario']->getIdPartidas());
$personajeAux->setAlias($_POST['alias']);
$personajeAux->setNivel($_POST['nivel']);
$personajeAux->setExp($_POST['exp']);
$personajeAux->setMonedas($_POST['monedas']);
$personajeAux->setFuerza($_POST['fuerza']);
$personajeAux->setDestreza($_POST['destreza']);
$personajeAux->setCarisma($_POST['carisma']);

$_SESSION['personaje'] = $personajeAux;

$personajeAux->guardarPartida();

?>