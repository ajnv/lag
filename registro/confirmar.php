<?php

$valido = true;

if (!isset($_GET['token']) || $_GET['token'] == NULL || (strlen($_GET['token'])>32)
	|| !ctype_alnum($_GET['token'])){

	$valido = false;
}
if ($valido){

	$tokenRecibido = mysql_real_escape_string($_GET['token']);

	$connect = mysqli_connect("localhost", "confirmar", "", "lag");

	if (mysqli_connect_errno($connect)){

		// Esto va a logs.
		echo "Failed to connect to MySQL: " . mysqli_connect_error($connect);
	}

	$chkToken = mysqli_query($connect, "SELECT matricula FROM confirmar_int WHERE token = '$tokenRecibido'");

	if (mysqli_num_rows($chkToken) == 1){

		$resultado = mysqli_fetch_assoc($chkToken);
		$matriculaToken = $resultado['matricula'];
		$activarUsuario = "UPDATE usuarios_int SET activo = 1 WHERE matricula = '$matriculaToken'";
		$borrarToken = "DELETE FROM confirmar_int WHERE token = '$tokenRecibido'";

		mysqli_query($connect, "BEGIN"); // Iniciar transaccion.
		$error = 0; // Control de errores.

		// Activar el usuario.
		$mq1 = mysqli_query($connect, $activarUsuario);
		if (!$mq1){
			$error = 1;
		}

		// Eliminar token de confirmacion.
		$mq2 = mysqli_query($connect, $borrarToken);
		if (!$mq2){
			$error = 1;
		}

		if ($error){
				mysqli_query($connect, "ROLLBACK"); // Deshacer cambios.
				echo "Error en la transaccion";
			} else {
				mysqli_query($connect, "COMMIT"); // Guardar cambios.
				echo "Transaccion exitosa";
			}
			mysqli_close($connect); // Cerrar conexion.

	} else {
		mysqli_close($connect);
		echo "Ingrese un token valido.";
	}
}
else {
	echo "Ingrese un token valido.";
}
?>