<?php 
include("conexion.php");

$nombre=$_POST["nombre"];
$apellidos=$_POST["apellido"];
$password=$_POST["password"];
$email=$_POST["email"];
$institucion=$_POST["institucion"];
$matricula=$_POST["matricula"];
echo $matricula;
//falta validar que no se repita el correo electronico
if(empty ($matricula)){

	$insert=mysql_query("insert into usuarios_ext(nombre,apellidos,password,email ) values(  '$nombre', 
			'$apellidos',
			'$password',
			'$email' )") or die (mysql_error());
				
	
	
	
	
	
	
	}
	
	
else{

	$check=mysql_query("select * from usuarios_int where matricula= '$matricula'");

if(mysql_num_rows($check)>=1){
	?> <script> window.history.back();</script> 
    <?php
	}	
	
	
else 
{
	$insert=mysql_query("insert into usuarios_int(nombre,apellidos,password,email, matricula ) values(  '$nombre', 
			'$apellidos',
			'$password',
			'$email',
			'$matricula' )") or die (mysql_error());
			
	
	}
	}