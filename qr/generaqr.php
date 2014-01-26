<?php

$link = mysql_connect("localhost","root","");
mysql_select_db("qr",$link);


include "phpqrcode.php";    
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
 $PNG_WEB_DIR = 'temp/';
  $errorCorrectionLevel = 'H';
  $matrixPointSize = 3;
  $con=$_POST['nombre'];
  
  
  $nombre="http://172.20.10.6/qr/ver.php?ver=".$con;
  echo "este es el codigo para el registro: ".$_POST['nombre'];
  
 $filename = $PNG_TEMP_DIR.'no'.md5($nombre.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
 QRcode::png($nombre, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
 echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
 $file='no'.md5($nombre.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';

 $insertar =mysql_query("insert into registro (nombre,img) values ('$con','$file')");
 
 ?>