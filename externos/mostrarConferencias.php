<?php

function normalDate($date){
		ereg("([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $date, $newDate);
		$tDate = $newDate[3]."/".$newDate[2]."/".$newDate[1];
		return $tDate;
	}

if (isset($_GET['q']) && $_GET['q'] == "2"){
	error_reporting(0);

	include ("conexion.php");

	$consulta = mysqli_query($connect, "select * from conferencias");

	?>
	<table>
	<tr>

	<?php
	if ($consulta){
		
		?>
		<td>Elegir Conferencia:</td>
		<td>
		<select name="conferencias">
		<?php
		while($row = mysqli_fetch_assoc($consulta)){
			echo "<option " . "value = ".$row['id_conferencia']."".">".$row['ponente'] ." - ". $row['fecha'] ."</option>";
		}
		?>
		</select>
		</td>
		<?php
	}
	else{

		echo "<td>Ocurrio un error, reintente</td>";
	}
	?>
	</tr>
	<table>
	
<?php
}
?>