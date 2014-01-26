<?php

include("conexion.php");  
$matricula=$_REQUEST['matricula'];  
$sql="SELECT * FROM usuarios_int WHERE matricula='$matricula'";
$res=mysql_query($sql);  
$total=mysql_num_rows($res);  
if($total>0)  
{ ?>  
  
  <p  style="color:#F00"> la matricula ya se encuentra registrada </p>
  
  <?php
}  
else  
{  
  // Ese nick esta libre  
  }  
?>  <!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>