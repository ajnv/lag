<?php
?>
<html>
<head>
<script>
/*function mostrarCosto(opcion){
	var costo = document.getElementById("costo_t");
	var tabla = document.getElementById("rTable");
	var rowCount = tabla.rows.length;
	if (rowCount == 3){
		tabla.deleteRow(rowCount-2);
	}
	costo.value = "";

	if (opcion == "0"){
		costo.value = "750.00 M/N";
	}
	else if (opcion == "1"){
		
		var rowCount = tabla.rows.length-1;
		var row = tabla.insertRow(rowCount);
		var cell1 = row.insertCell(0);
		var element1 = document.createTextNode("Dia: ");
		cell1.appendChild(element1);

		var cell3 = row.insertCell(1);
        var element2 = document.createElement("select");
        element2.id = "day_select";
        cell3.appendChild(element2);
        var chDay = document.getElementById("day_select");
        var option = document.createElement("option");
        option.text = "Seleccionar";
        option.value = null;
        chDay.add(option);
        var option = document.createElement("option");
        option.text = "Miercoles 7 de Mayo";
        option.value = "1";
        chDay.add(option);
        var option = document.createElement("option");
        option.text = "Jueves 8 de Mayo";
        option.value = "2";
        chDay.add(option);
        var option = document.createElement("option");
        option.text = "Viernes 9 de Mayo";
        option.value = "3";
        chDay.add(option);
		costo.value = "200.00 M/N";
	}
}*/

function showConf(str){

	if (str==null || str!="2")
  	{
  		document.getElementById("sConferences").innerHTML="";
  	}

  	var costo = document.getElementById("costo_t");
  	var tabla = document.getElementById("rTable");
	var rowCount = tabla.rows.length;

	if (str == "0"){
		costo.value = "750.00 M/N";
		var drow = document.getElementById("div_day");
		drow.parentNode.removeChild(drow);
		return;
	}
	else if(str == "1"){

		//var rowCount = tabla.rows.length-1;
		//var row = tabla.insertRow(rowCount);
		//var cell1 = row.insertCell(0);
		//cell1.id = "roy_Day";
		//cell1.rows = "2";
		var element1 = document.getElementById("sConferences");
		var txt = document.createTextNode("Elegir Dia: ");
		element1.appendChild(txt);
		//cell1.appendChild(element1);

		//var cell3 = row.insertCell(1);
        var element2 = document.createElement("select");
        element2.id = "day_select";
        element1.appendChild(element2);
        var chDay = document.getElementById("day_select");
        var option = document.createElement("option");
        option.text = "Seleccionar";
        option.value = null;
        chDay.add(option);
        var option = document.createElement("option");
        option.text = "Miercoles 7 de Mayo";
        option.value = "1";
        chDay.add(option);
        var option = document.createElement("option");
        option.text = "Jueves 8 de Mayo";
        option.value = "2";
        chDay.add(option);
        var option = document.createElement("option");
        option.text = "Viernes 9 de Mayo";
        option.value = "3";
        chDay.add(option);
		costo.value = "250.00 M/N";
		return;
	}
	else if (str == "2"){
		costo.value = "150.00 M/N";
	}
	else{
		costo.value = "0.00 M/N";
		return;
	}
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function()
  	{
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
    		document.getElementById("sConferences").innerHTML=xmlhttp.responseText;
    	}
  	}
	xmlhttp.open("GET","mostrarConferencias.php?q="+str,true);
	xmlhttp.send();

}
</script>
</head>
<body>
<table name="rTable" id="rTable" border="0">
<tr>
<td>Reservar:</td>
<td>
<select name="tipo_reservacion" onchange="showConf(this.value)">
<option value=null select>Seleccionar</option>
<option value="0">Evento Completo</option>
<option value="1">Dia completo</option>
<option value="2">Conferencia</option>
</select>
</td>
</tr>
<tr>
<td colspan="2">
<div id="sConferences"></div>
</td>
</tr>
<tr>
<td>Costo total: </td><td><input type="text" value="0.00 M/N" name="costo_t" id="costo_t" readonly/></td>
</tr>
</table>
</body>
</html>
<?php
?>