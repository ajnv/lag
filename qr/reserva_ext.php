<?php 
include("seguridad.php");
if($_SESSION["tipo"]=="externo");
{
	header("location:reserva_int.php");
	
	}
	
?>

<form method="post" action="fin_reserva.php">
	<table><tr><td colspan="3">Reserva </td></tr>
    <tr><td> Completo<input type="radio" name="evento" value="completo"></td>
    	 <td> Dia<input type="radio" name="evento" value="dia"></td>
         <td>Conferencia<input type="radio" name="evento" value="conferencia"></td></tr>
         <tr>
         <td colspan="3">aqui con javaScript se cambiara si es dia se despliega la lista de dias si es conferencia salen las listas de conferencias si es completo se deshabilita</td></tr>
         <tr><td colspan="3"> Total: $$</td></tr>
         
         
         </table>
         
         