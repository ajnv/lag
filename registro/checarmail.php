<?php

if (!isset($_GET['q'])){
	header("location: index.php");
	exit();
}

include ("clear.php");

$q = clear_var($_GET['q']);

if (filter_var($q, FILTER_VALIDATE_EMAIL)){
	
	include ("conexion.php");

	$sql=mysqli_query($connect, "SELECT * FROM usuarios_ext WHERE correo = '".$q."'");

	if (mysqli_num_rows($sql)){
     		echo "<table><tr><td >Correo Ya Registrado</td></tr></table>";
	}
	mysqli_close($connect);
} 	
else {
	echo "<table><tr><td >Ingrese un Email Valido</td></tr></table>";	
}

?>