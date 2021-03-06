<?php
include('enviarmail.php');
include('conexion.php');
mysql_connect("localhost", "diezlagc", "Ul3Us98s5a", "diezlagc_lag");
$clave=$_POST['txt_clave'];
$clavec=$_POST['txt_clavec'];
$tipo=$_POST['alumno'];

///// Funciones /////

function verifyString($cadena, $longMax, $tipo=0){
	if ($tipo)
		return isset($cadena) && ($cadena!=NULL) && (strlen($cadena)<=$longMax);
	return isset($cadena) && ($cadena!=NULL) && (strlen($cadena)<=$longMax);
}

///// Verificar si las variables estan definidas al momento de que el script es llamado.

if (!isset($tipo) || !isset($clave) || !isset($clavec)){
	header("location: index.php");
	exit();
}

///// Validar que las variables obligatorias tengan algun valor y correspondan con la longitud esperada en la BD./////

if ($tipo!=NULL && $tipo=='1' && (strlen($tipo)==1) && is_numeric($tipo) 
		&& isset($_POST['txt_matricula']) && $_POST['txt_matricula']!=NULL &&
		(strlen($_POST['txt_matricula'])==6) && is_numeric($_POST['txt_matricula'])){
	
	$matricula=mysql_real_escape_string($_POST['txt_matricula']);
	$tipo_registro = 1; // Registro Interno.
} 
elseif ($tipo!=NULL && $tipo=='0' && (strlen($tipo)==1) && is_numeric($tipo) &&
		verifyString($_POST['txt_institucion'], 15, 1) &&
		verifyString($_POST['txt_nombre'], 60, 1) && 
		verifyString($_POST['txt_apellidos'], 80, 1) &&
		verifyString($_POST['txt_correo'], 51,0) &&
		verifyString($_POST['txt_correoc'], 51,0)){
	
	$institucion = mysql_real_escape_string($_POST['txt_institucion']);
	$nombre = mysql_real_escape_string($_POST['txt_nombre']);
	$apellidos = mysql_real_escape_string($_POST['txt_apellidos']);
	$correo = mysql_real_escape_string($_POST['txt_correo']);
	$correoc = mysql_real_escape_string($_POST['txt_correoc']);
	$nombre_completo = $nombre . " " . $apellidos;
	$tipo_registro = 2; // Registro externo.
}
else {
	
	$tipo_registro = 0;
}

if ($clave==NULL || $clavec==NULL || (strlen($clave)>15) || (strlen($clavec)>15) || $tipo_registro==0){
	
	// Variables obligatorias incompletas o alteracion del formulario para saltar validacion.
	header("location: index.php");
	exit();
}

$valido = 1;

if ($tipo_registro == 2){
	if (($correo != $correoc) || !filter_var($correo, FILTER_VALIDATE_EMAIL)){
		$valido = 0;
	}
} 

if ($valido){

	if ($clave == $clavec){

		include("conexion.php");


		if ($tipo_registro == 1){
			$correoUPSLP = $matricula . "@upslp.edu.mx";
			$check_ma = mysqli_query($connect, "select * from usuarios_int where matricula = '$matricula'");
			$check_ma_ext = mysqli_query($connect, "select * from usuarios_ext where correo = '$correoUPSLP'");
			$existe = mysqli_num_rows($check_ma) || mysqli_num_rows($check_ma_ext);
		}
		elseif ($tipo_registro == 2){
			$quitarDom = explode("@", $correo);
			$check_ma = mysqli_query($connect, "select * from usuarios_int_inf where matricula = '$quitarDom[0]'");
			$check_ma_ext = mysqli_query($connect, "select * from usuarios_ext where correo = '$correo'");
			$existe = mysqli_num_rows($check_ma_ext) || mysqli_num_rows($check_ma);
		}
		else {
			$existe = 1;
		}

		if ($existe > 0) {

			// Matricula y/o correo existentes.
			mysqli_close($connect);
			echo "<script> window.history.back();</script>";
			exit();
		} 
		else {

			$noLAG = false;
			$clave = md5($clave);
			if ($tipo_registro == 1){

				$verificar = mysqli_query($connect, "select * from referencias_int where matricula = '$matricula'");
				if (!mysqli_num_rows($verificar)){
					// Inserccion incompleta.
					$consulta3 = "insert into usuarios_int_inf ".
					"(matricula, periodo, datos_completos) ".
					"values('$matricula', '20141S', 0)";
					//echo "No existe, insertar pero incompleto.";
					echo '<script language="javascript">alert("Verifica tu correo institucional y completa el registro");</script>';
	echo "<script> window.history.back();</script>";
					
					
					$noLAG = true;
				}

				$consulta = "insert into usuarios_int"
		 			."(matricula, clave_acceso, fecha_registro, activo) "
		 			."values ('$matricula', '$clave', now(), 0)";

		 		$token = md5(date("Y-m-d H:i:s") . $matricula);
		 		
		 		$consulta2 = "insert into confirmar_int ".
		 			"(matricula, token) ".
		 			"values ('$matricula', '$token')";

			}
			elseif ($tipo_registro == 2){

		 		$consulta = "insert into usuarios_ext_inf ".
		 			"(nombre, institucion,correo) ".
		 			"values ('$nombre_completo', '$institucion','$correo')";

		 		$consulta2 = "insert into usuarios_ext"
		 			."(id, correo, clave_acceso, fecha_registro, activo) "
		 			."values (last_insert_id(), '$correo', '$clave', now(), 0)";

		 		$token = md5(date("Y-m-d H:i:s") . $correo);

		 		$consulta3 = "insert into confirmar_ext ".
		 			"(correo, token) ".
		 			"values ('$correo', '$token')";
			}
			
			mysqli_query($connect, "BEGIN"); // Iniciar transaccion.
			$error = 0; // control de errores.
			$mq1 = mysqli_query($connect, $consulta);
			if (!$mq1){
				$error=1; // error.
			}
			$mq2 = mysqli_query($connect, $consulta2);
			if (!$mq2){
				$error=1; // error.
			}
			if (($tipo_registro == 1 && $noLAG) || $tipo_registro == 2){
				$mq3 = mysqli_query($connect, $consulta3);
				if (!$mq3){
					$error=1; // error.
				}
			}
			if ($error){
				mysqli_query($connect, "ROLLBACK"); // Deshacer cambios.
				
				//echo "Error en la transaccion";
				echo '<script language="javascript">alert("Ha ocurrido un error por favor intentalo de nuevo");</script>';
	echo "<script> window.history.back();</script>";
				
				
				
			} else {
				
				mysqli_query($connect, "COMMIT"); // Guardar cambios.
				//echo "Transaccion exitosa";
					if($tipo_registro==1){
						$correo=$matricula."@upslp.edu.mx";
						email($correo,$token);
						echo '<script language="javascript">alert("Verifica tu correo intitucional para completar el registro y ver tus detalles de pago");</script>';
	echo "<script> window.history.back();</script>";
	
						}
						
					elseif($tipo_registro==2){
						
						email($correo,$token);
						
						echo '<script language="javascript">alert("verifica tu correo para completar el registro");</script>';
	echo "<script> window.history.back();</script>";

						}	
				
				
				
			
			}
			mysqli_close($connect); // Cerrar conexion.*/
			
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