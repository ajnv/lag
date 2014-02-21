<?php
<<<<<<< HEAD

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
=======
include('conexion.php');

$token=mysqli_real_escape_string($connect,$_GET['token']);//limpia el token


$type=0;
$query=mysqli_query($connect,"select * from confirmar_ext where token='$token'");//verificamos token en externos
$query2=mysqli_query($connect,"select * from confirmar_int where token='$token'");//verificamos token en internos

if(mysqli_num_rows($query))
{
	$type=1;//externos
	}
	
	elseif(mysqli_num_rows($query2))
	{
		
		$type=2;//internos
		
		}
	
if($type==1)//externos
{
	
	$row=mysqli_fetch_assoc($query);
	$correo=$row['correo'];
	$confirmar="update usuarios_ext set activo=1 where correo='$correo'";
	$borrar="delete from confirmar_ext where correo='$correo'";
	// borrar de confirmar_ext
	mysqli_query($connect, "BEGIN");
	$error=0;
	$c1=mysqli_query($connect,$confirmar);
	if(!$c1){
		$error=1;
		}
	$c2=mysqli_query($connect,$borrar);
	if(!$c2){
		$error=1;
		}
	
	if($error==1){
		mysqli_query($connect, "ROLLBACK");
		echo mysqli_error();
		echo "ocurrio un error";
		}
	else {
				mysqli_query($connect, "COMMIT"); // Guardar cambios.
				echo "Transaccion exitosa";
	
	session_start();
	$_SESSION['correo']=$correo;
	$_SESSION['nombre']=$row['nombre'];
	$_SESSION['institucion']=$row['institucion'];
	//iniciamos sesion para ir a reservar con los datos de la sesion
	//header("location:reserva_ext.php");
	
	}
	
	
	
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($type==2)//internos
{
	
	
		$row=mysqli_fetch_assoc($query2);
		echo $row['matricula'];
		$matricula=$row['matricula'];
		$borrar="delete from confirmar_int where matricula='$matricula'";
		$activar="update usuarios_int set activo=1 where matricula='$matricula'";
			
	mysqli_query($connect, "BEGIN");
	$error=0;
	$c1=mysqli_query($connect,$borrar);
	if(!$c1){
		$error=1;
		}
	$c2=mysqli_query($connect,$activar);
	if(!$c2){
		$error=1;
		}
	
	if($error==1){
		mysqli_query($connect, "ROLLBACK");
		echo mysqli_error();
		echo "ocurrio un error";
		}
	else {
				mysqli_query($connect, "COMMIT"); // Guardar cambios.
				echo "Transaccion exitosa";
	$datos=mysqli_query($connect,"select * from usuarios_int_inf where matricula='$matricula'");
	$datos=mysqli_fetch_assoc($datos);	
	if($datos['datos_completos']==0){//verificamos si los datos estan completos
	echo "datos incompletos";
	session_start();
	$_SESSION['matricula']=$matricula;
	
	//header("location:completa_datos.php");
	//se envia a lugar para completar datos 
	
	
	}
	else{//si existen sus datos completos se enviara a la pagina de reserva interna
				
	echo $matricula;
	session_start();
	$_SESSION['nombre']=$row['nombre'];
	$_SESSION['matricula']=$matricula;
	//header("location:reserva_int.php);
	}
	}
	
	}
elseif($type==0)//si no se encuentra coincidencia con ningun token se envia error
{
	echo "token no valido";
	
	
	}

>>>>>>> 136af1fd7ff8c54bf65ae7f61d4f41b00e2c48d2
