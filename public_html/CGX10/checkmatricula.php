<?php

if (!isset($_GET['q'])){
	header("location: index.php");
	exit();
}

include ("clear.php");

$q = clear_var($_GET['q']);

if (is_numeric($q) && strlen($q) == 6){
	
	include ("conexion.php");

	$sql=mysqli_query($connect, "SELECT * FROM usuarios_int WHERE matricula = '".$q."'");

	if (mysqli_num_rows($sql)){
     		echo "<table><tr><td >Matricula ya registrada</td></tr></table>";
	}
	mysqli_close($connect);
} 	
else {
	echo "<table><tr><td >Ingrese una matricula numerica valida</td></tr></table>";	
}

?>