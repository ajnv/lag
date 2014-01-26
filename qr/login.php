<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>

<style type="text/css">

#apDiv1 {
	position: absolute;
	float:left;
	top: 18px;
	width: 184px;
	height: 41px;
	z-index: 1;
	}



#contenedor{
	
	width: 1000px;
	margin:0 auto;
	
	}
</style>


</head>

<body>

<div id="contenedor">
<div id="apDiv1" >
<form action="validarlogin.php" method="post">
<table>
<tr>
<td><input type="text" name="usuario" ></td><td>Email</td></tr>
<tr>
<td> <input type="password" name="password"></td><td> Password</td></tr>
<tr> <td colspan="2" align="center"> <input type="submit" value="Aceptar"></td></tr></table> </form>

</div>
</div>
</body>
</html>