<?php

$nombre=$_POST['txt_nombre'];
$apellidos=$_POST['txt_apellidos'];
$clave=$_POST['txt_clave'];
$clavec=$_POST['txt_clavec'];
$correo=$_POST['txt_correo'];
$correoc=$_POST['txt_correoc'];
$matricula=$_POST['txt_matricula'];

///// Verificar si las variables estan definidas al momento de que el script es llamado.

if ((!isset($nombre)) || (!isset($apellidos)) || (!isset($clave)) || (!isset($clavec)) || (!isset($correo)) || (!isset($correoc)) || (!isset($matricula))){
	header("location: index.php");
	exit();
}

///// Validar que las variables obligatorias tengan algun valor y correspondan con la longitud esperada en la BD./////

if (($nombre==NULL || $apellidos==NULL || $clave==NULL || $clavec==NULL || $correo==NULL || $correoc==NULL || $matricula==NULL) || 
		((strlen($nombre)<81) && (strlen($apellidos)<80) && (strlen($clave)<15) && (strlen($clavec)<15) && (strlen($correo)<51) && (strlen($correoc)<51)
		&& (strlen($matricula)!=6))) {

	// Variables obligatorias incompletas o alteracion del formulario para saltar validacion.
	header("location: registro_int.php");
	exit();
}

if (($correo == $correoc) && filter_var($correo, FILTER_VALIDATE_EMAIL)){

	// Correo electronico y confirmacion validos.
	if ($clave == $clavec){

		include("conexion.php");

		$check_ma = mysql_query("select * from usuarios_int where matricula = '$matricula' and email = '$correo'");
		$check_ma_ext =  mysql_query("select * from usuarios_ext where email = '$correo'");
		if (mysql_num_rows($check_ma) || mysql_num_rows($check_ma_ext)) {

		// Matricula y/o correo existentes.
		mysql_close($link);
		echo "<script> window.history.back();</script>";
		exit();
		} else {

			$clave = md5($clave);
			$query = mysql_query("insert into usuarios_int"
		 	."(nombre, apellidos, password, email, matricula) "
		 	."values ('$nombre', '$apellidos', '$clave', '$correo', '$matricula')", $link);
			if (mysql_affected_rows($link)) {

				mysql_close($link);
				//echo "<script> window.alert('Registro exitoso');</script>";
				header("location: index.php");
				exit();
			} else {
				// Ocurrio un error inesperado, mandar a log de errores.
				header("location: index.php");
				exit();
			}
		}
	} else {

		//No coinciden la contraseña y la confirmacion de esta.
		// Regresar a la pagina anterior y avisar al usuario.
		echo '<script language="javascript">alert("Verifique confirmacion de contraseña");</script>';
		echo "<script> window.history.back();</script>";
		exit();
	}
} else {

	//No coinciden el correo y la confirmacion de este.
	// Regresar a la pagina anterior y avisar al usuario.
	echo '<script language="javascript">alert("Verifique confirmacion de correo electronico");</script>';
	echo "<script> window.history.back();</script>";
	exit();
}

?>