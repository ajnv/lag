<?php

if (!isset($_GET['q'])){
	header("location: index.php");
	exit();
}

include ("clear.php");

$q = clear_var($_GET['q']);

if (filter_var($q, FILTER_VALIDATE_EMAIL)){
	
	include ("conexion.php");

	$sql=mysqli_query($connect, "SELECT * FROM usuarios_ext WHERE correo = '$q'");

	if (mysqli_num_rows($sql)){
     		echo "<table><tr><td ><FONT COLOR='red'>Correo ya Registrado </FONT></td></tr></table>";
	}
	else{
		
		}
	
	
	//mysqli_close($connect);
} 	
else {
	echo "<table><tr><td ><FONT COLOR='red'>Ingrese Un Correo Valido </FONT></td></tr></table>";	
}

?>