<?php

if (!isset($_GET['q'])){
	header("location: index.php");
	exit();
}

include ("clear.php");

$q = clear_var($_GET['q']);

$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error($con));
  }

mysql_select_db("lag",$con);

$sql=mysql_query("SELECT * FROM usuarios_int WHERE email = '".$q."'", $con);
$sql2=mysql_query("SELECT * FROM usuarios_ext WHERE email = '".$q."'", $con);

if (mysql_num_rows($sql) || mysql_num_rows($sql2)){
     echo "<table><tr><td >Correo ya registrado</td></tr></table>";
  }

mysql_close($con);
?>