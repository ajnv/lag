<?php
include('conexion.php');
if(!isset($_GET['token'])|| $_GET['token']==NULL|| (strlen($_GET['token'])>32)|| !ctype_alnum($_GET['token'])){
	
	echo '<script language="javascript">alert("Token no valido");</script>';
	echo '<script language="javascript"> location.href = "index.php";</script>';
	

	
	}
	
	
else{	
$token=mysqli_real_escape_string($connect,$_GET['token']);//limpia el token


$type=0;
$query=mysqli_query($connect,"select * from confirmar_ext where token='$token'");//verificamos token en externos
$query2=mysqli_query($connect,"select * from confirmar_int where token='$token'");//verificamos token en internos

if(mysqli_num_rows($query))
{
	$type=1;//externos
	}
	
	elseif(mysqli_num_rows($query2))
	{
		
		$type=2;//internos
		
		}
	
if($type==1)//externos
{
	
	$row=mysqli_fetch_assoc($query);
	$correo=$row['correo'];
	$confirmar="update usuarios_ext set activo=1 where correo='$correo'";
	$borrar="delete from confirmar_ext where correo='$correo'";
	// borrar de confirmar_ext
	mysqli_query($connect, "BEGIN");
	$error=0;
	$c1=mysqli_query($connect,$confirmar);
	if(!$c1){
		$error=1;
		}
	$c2=mysqli_query($connect,$borrar);
	if(!$c2){
		$error=1;
		}
	
	if($error==1){
		mysqli_query($connect, "ROLLBACK");
		echo mysqli_error();
		echo '<script language="javascript">alert("Ha ocurrido un error");</script>';
		//echo "ocurrio un error";
		}
	else {
				mysqli_query($connect, "COMMIT"); // Guardar cambios.
				echo '<script language="javascript">alert("Estamos generando tu referencia de pago, la enviaremos a tu correo en cuanto este lista");</script>';
	echo '<script language="javascript"> location.href = "index.php"	;</script>';			
	
	//session_start();
	//$_SESSION['correo']=$correo;
	//$_SESSION['nombre']=$row['nombre'];
	//$_SESSION['institucion']=$row['institucion'];
	//iniciamos sesion para ir a reservar con los datos de la sesion
	//header("location:reserva_ext.php");
	
	}
	
	
	
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
elseif($type==2)//internos
{
	
	
		$row=mysqli_fetch_assoc($query2);
		//echo $row['matricula'];
		$matricula=$row['matricula'];
		$borrar="delete from confirmar_int where matricula='$matricula'";
		$activar="update usuarios_int set activo=1 where matricula='$matricula'";
			
	mysqli_query($connect, "BEGIN");
	$error=0;
	$c1=mysqli_query($connect,$borrar);
	if(!$c1){
		$error=1;
		}
	$c2=mysqli_query($connect,$activar);
	if(!$c2){
		$error=1;
		}
	
	if($error==1){
		mysqli_query($connect, "ROLLBACK");
		echo mysqli_error();
		echo "ocurrio un error";
		}
	else {
				mysqli_query($connect, "COMMIT"); // Guardar cambios.
			//	echo "Transaccion exitosa";
	$datos=mysqli_query($connect,"select * from usuarios_int_inf where matricula='$matricula'");
	$datos=mysqli_fetch_assoc($datos);	
	if($datos['datos_completos']==0){//verificamos si los datos estan completos
	//echo "datos incompletos";
	
	echo '<script language="javascript">alert("Estamos generando tu referencia de pago, la enviaremos a tu correo institucional en cuanto este lista");</script>';
	echo '<script language="javascript"> location.href = "index.php"	;</script>';	
	
	
	//session_start();
	//$_SESSION['matricula']=$matricula;
	
	//header("location:completa_datos.php");
	//se envia a lugar para completar datos 
	
	
	}
	else{//si existen sus datos completos se enviara a la pagina de reserva interna
				
	//echo $matricula;
	//session_start();
	//SESSION['nombre']=$row['nombre'];
	//$_SESSION['matricula']=$matricula;
	
	$referencia=mysqli_query($connect,"select * from referencias_int where matricula='$matricula'");
	$referencia=mysqli_fetch_assoc($referencia);
	$dato_ref=$referencia['referencia'];
	
	
	$valores=mysqli_query($connect,"select * from usuarios_int_inf where matricula='$matricula'");
	$valores=mysqli_fetch_assoc($valores);
	
	//echo $correctos_datos;
	//echo "\n Referencia en BBVA BANCOMER".$dato_ref;
	
	$asunto='Referencia de pago Decima Semana De Administracion y Gestion';


	$mensaje='<style type="text/css">
.tras {
	font-size: 32px;
	font-family: "Times New Roman", Times, serif;
}
.tres {
	font-family: "Times New Roman", Times, serif;
	font-size: 24px;
}
.tres strong {
	font-size: 21px;
	font-family: "Times New Roman", Times, serif;
}
.banco {
	color: #00F;
}
.table_1 {
	font-weight: bold;
}
.table_1 {
	font-weight: bold;
}
.r {
	font-weight: bold;
	font-size: 18px;
}
.cur {
	font-style: italic;
}
.PU {
	color: #666;
}
</style>
<table width="100%" border="0">
  <tr>
    <td><img src="http://diezlag.com/img/cave.jpg" width="1022" height="140">
      <p><span class="PU"><strong class="tras">::</strong></span><strong class="tras">Universidad
    Politécnica de San Luis Potosí</strong></p></td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

    
    <table width="100%" border="0">
      <tr>
        <td bgcolor="#999999" class="tres"><strong>Número 
de Referencia Bancaria</strong></td>
        </tr>
      <tr>
        <td><span style="font-size:10.5pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
    mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-language:ES-MX">Verifica
    que los datos que se muestran sean correctos.
            <o:p></o:p>
        </span></td>
        </tr>
      <tr>
        <td>Para 
realizar el pago de la <strong>Décima Semana de Administración y Gestión</strong> deberás presentarte en cualquier sucursal <span class="banco"><strong>BBVA BANCOMER </strong></span>con la siguiente información y con el monto correcto:</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr class="table_1">
        <td class="table_1">Matricula </td>
        <td>Nombre </td>
        <td>Carrera </td>
        <td>Periodo</td>
      </tr>
      <tr>
        <td>'.$matricula.'</td>
        <td>'.$valores['nombre'].'</td>
        <td>'.$valores['carrera'].'</td>
        <td>'.$valores['periodo'].'</td>
      </tr>
      </table>
      <table width="71%" border="0">
        <tr>
          <td><span class="r">Número
de</span> <strong><span class="banco">Convenio CIE: </span><u>877506</u></strong></td>
        </tr>
        <tr>
          <td class="r">Número 
de Referencia Bancaria <strong><span class="banco">BBVA BANCOMER</span>: '.$dato_ref.'</strong></td>
        </tr>
      </table>
      <table width="100%" border="1">
        <tr>
          <td colspan="3" class="cur">Pago 
    en 3 exhibiciones</td>
        </tr>
        <tr>
          <td>1er pago
            
       </td>
          <td>Del
        15 de Febrero al 15 de Marzo
         
          </td>
          <td>$200.00 M.N.</td>
        </tr>
        <tr>
          <td>2do pago
             
        </td>
          <td>Del
        16 de Marzo al 01 de Abril</td>
          <td>
        $100.00 M.N.</td>
        </tr>
        <tr>
          <td>3er pago
          </td>
          <td>Del
        02 de Abril al 15 de Abril
           
         </td>
          <td>$200.00 M.N.</td>
        </tr>
      </table>
      <p><span class="banco"><strong>NOTA</strong></span>: <span class="cur"><span class="cur">El costo del boleto es
        de $500.00, y será divido en 2 pagos parciales de $200.00 y una parcialidad
        de $100.00 esto si realizan el primer pago antes del&nbsp;15 de marzo del
        2014.</i>
        
      </span></p>
      <table width="100%" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="1">
        <tr>
          <td colspan="2" class="cur">Cualquier
duda puede comunicarse con:</td>
        </tr>
        <tr>
          <td>Víctor
Manuel Delgado Martínez </td>
          <td><span class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal">comiteorganizador@diezlag.com</span></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
';	
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 

$cabeceras .= 'From: Registro <registro@diezlag.com>' . "\r\n";
$email=$matricula."@upslp.edu.mx";
	$envio=mail($email, $asunto, $mensaje, $cabeceras);
	
	echo $email;
		
echo '<script language="javascript">alert("Se ha enviado la referencia a tu correo institucional, verifica en span si no es visible en la bandeja de entrada");</script>';
	echo '<script language="javascript"> location.href = "index.php";</script>';
		
		
	
	
	}
	}
	
	}
elseif($type==0)//si no se encuentra coincidencia con ningun token se envia error
{
	echo '<script language="javascript">alert("Token no valido");</script>';
	echo '<script language="javascript"> location.href = "index.php";</script>';
		
	
	}

}