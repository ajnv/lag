<?php

$link = mysql_connect("localhost","root","");
mysql_select_db("qr",$link);


?>

<table border="1">
	<tr>
<td> <font face="Century Gothic"> Nombre </font> </td>
		<td> <font face="Century Gothic"> Codigo  </font> </td>
		
		<?php
	$query = "SELECT * FROM registro";
	
	$result = mysql_query($query,$link);

	
	while ($row=mysql_fetch_assoc($result))
	{

?>
 <tr> 
				<td> <font face='Century Gothic'><?php echo $row['nombre']; ?></font></td>
				<td> <img src="temp/<?php echo $row['img']?>" /></td>
				</tr>
				
				<?php }
?>
	
	</table> 