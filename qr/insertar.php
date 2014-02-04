<?php 
include("conexion.php");

$nombre=$_POST["nombre"];
$apellidos=$_POST["apellido"];
$password=$_POST["password"];
$email=$_POST["email"];
$institucion=$_POST["institucion"];
$matricula=$_POST["matricula"];
echo $matricula;
$retro=0;
$chck_mail=(mysql_num_rows(mysql_query("select * from usuarios_ext where email='$email'")));
$chck_mail2=(mysql_num_rows(mysql_query("select * from usuarios_int where email='$email'")));
if($chck_mail>0 || $chck_mail2>0)
{
	
	$retro=1;
	
	}

if(empty ($matricula)){


if($retro==1)
{
	
	
	?> <script> window.history.back();</script> 
    <?php
	
	}
	else{
	$insert=mysql_query("insert into usuarios_ext(nombre,apellidos,password,email ) values(  '$nombre', 
			'$apellidos',
			'$password',
			'$email' )") or die (mysql_error());
			
			
			session_start();
			$_SESSION['autentificado']="SI";
			$_SESSION['tipo']="EXTERNO";
			$_SESSION['email']=$email;
			
			header("location:reserva_ext");
				
	
	}
	
	
	
	
	}
	
	
else{

	$check=mysql_query("select * from usuarios_int where matricula= '$matricula'");

if(mysql_num_rows($check)>=1){
	?> <script> window.history.back();</script> 
    <?php
	}	
	
	
else 
{
	
	
	
	if($retro==1){
		
		?> <script> window.history.back();</script> 
    <?php
		
		}
	else{
	
	$insert=mysql_query("insert into usuarios_int(nombre,apellidos,password,email, matricula ) values(  '$nombre', 
			'$apellidos',
			'$password',
			'$email',
			'$matricula' )") or die (mysql_error());
	}
	
	}
	}