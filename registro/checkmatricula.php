<?php

if (!isset($_GET['q'])){
	header("location: index.php");
	exit();
}

include ("clear.php");

$q = clear_var($_GET['q']);

if (is_numeric($q) && strlen($q) == 6){
	$con = mysqli_connect('localhost','root','');
	if (!$con)
  	{
  		die('Could not connect: ' . mysqli_error($con));
  	}

	mysqli_select_db($con,"lag");

	$sql="SELECT * FROM usuarios_int WHERE matricula = '".$q."'";

	if ($stmt = mysqli_prepare($con, $sql)){
  		mysqli_stmt_execute($stmt);
  		mysqli_stmt_store_result($stmt);
  		if (mysqli_stmt_num_rows($stmt) != 0){
     		echo "<table><tr><td >Matricula ya registrada</td></tr></table>";
  		}
	}	
	mysqli_close($con);
} else {
	echo "<table><tr><td >Ingrese una matricula numerica valida</td></tr></table>";	
}

?>