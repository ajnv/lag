<?php
include("conexion.php");
$nombre=$_POST["usuario"];
$pass=$_POST["password"];

if(is_numeric($nombre)){
	
$select=mysql_query("select password,nombre from usuarios_int where matricula='$nombre'");
	
	$select=mysql_fetch_assoc($select);
	if($select['password']==$pass){
		echo "los passwords coinciden";
		session_start();
		$_SESSION['nombre']=$select['nombre'];
		$_SESSION['valida']=true;
		header("location:reservacion.php");
		
		
		}
		
		
		else{
			echo "los passwords no coinciden";
			}
		
	
	}
	
	else if(stristr($nombre,'@')){
		
		echo "contiene @";
		
		
		
		}
