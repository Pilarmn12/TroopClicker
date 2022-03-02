<?php
// Incluye la clase.
include '../capaNegocio/usuario.php';
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>

<!--
	* desconectar.php
	* Módulo secundario que cierra la sesión.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestión de usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <header>
			<h1>Gestión de usuarios</h1>
        </header>
        <nav>
			<a href="index.php">Inicio</a> &nbsp;&nbsp;
			<a href="accesoUsuarios.php">Acceso usuarios</a>
        </nav>
        <article>
			<h3>Cierra sesión</h3>
			<?php
			/** Comprueba que la sesión esté iniciada. */
			if (isset($_SESSION['usuario'])) {
				echo "<h4>La sesión actual ha sido cerrada</h4>";
				echo '<h4>Adiós ' . $_SESSION['usuario']->getNombre() . '</h4>';
				/** Elimina todas las variables de sesión. */
				$_SESSION = array();
				/** Finaliza la sesión actual. */
				session_destroy();
			}
			else {
				/** El usuario no ha sido validado. */
				echo "<h5>El usuario no ha sido validado</h5>";
			}
			?>
		</article>
		<footer>
			<p>&copy; Gestión de usuarios</p>
		</footer>
    </body>
</html>
