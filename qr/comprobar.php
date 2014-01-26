<?php

include("conexion.php");  
$mail=$_REQUEST['email'];  
$sql="SELECT * FROM usuarios_int WHERE email='$mail'";
$res=mysql_query($sql);  
$total=mysql_num_rows($res);  
if($total>0)  
{ ?>  
  
  <p  style="color:#F00"> El correo ya se encuentra registrado </p>
  
  <?php
}  
else  
{  
  // Ese nick esta libre  
  }  
?>  