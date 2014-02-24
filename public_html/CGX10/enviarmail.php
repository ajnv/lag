<?php
//include('seguridad.php');


function email($correo, $token)
{
	

$asunto='Confirmacion de Registro Para Semana 10 LAG';
$mensaje='<html>
<head>
<title>E-Mail HTML</title>
</head>
<body>
<table width="94%" border="0">
  <tr>
    <th scope="col" align="left"><p><img src="http://diezlag.com/img/cave.jpg" width="1022" height="140"></p></th>
  </tr>
  <tr>
    <td><p>Para concluir tu registro haz click <a href="diezlag.com/confirma.php?token='.$token.'" > aqui </a>
	o entra al siguente enlace 
	
	<br>
	<br>
	<br>
	diezlag.com/confirma.php?token='.$token.'
	
	</strong> <br>
    Gracias.<br>
        <br>
        <strong>Atte. Comit&eacute; Organizador.</strong> <br>
      ** porfavor no responda a &eacute;ste mensaje via correo electr&oacute;nico **            
      <div><strong>Facebook Oficial:</strong><strong><em><a href="https://www.facebook.com/10SemanaLAG" target="_blank">www.facebook.com/10SemanaLAG</a></em></strong></div>
      <div><strong><em>Sitio Web:<a href="http://diezlag.com/" target="_blank">www.diezlag.com</a></em></strong><br>
      </div>
      <div><strong><em>Twitter:<a href="https://twitter.com/10maSemanaLAG" target="_blank">@10maSemanaLAG</a></em></strong></div>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td><img src="http://diezlag.com/img/ind.jpg" width="1022" height="110"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>';
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 

$cabeceras .= 'From: Registro <registo@diezlag.com>' . "\r\n";

	mail($correo, $asunto, $mensaje, $cabeceras);

	}

