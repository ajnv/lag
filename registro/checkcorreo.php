<?php

if (!isset($_GET['q'])){
	header("location: index.php");
	exit();
}

include ("clear.php");

$q = clear_var($_GET['q']);

include ("conexion.php");

//$sql=mysqli_query($connect, "SELECT * FROM usuarios_int WHERE correo = '".$q."'");
$sql2=mysqli_query($connect, "SELECT * FROM usuarios_ext WHERE correo = '".$q."'");

if (mysqli_num_rows($sql2)){
     echo "<table><tr><td >Correo ya registrado</td></tr></table>";
  }

mysqli_close($connect);
?>