<?php
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

