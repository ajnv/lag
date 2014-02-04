<html>
<head>
<script>
function checkCorreo(str)
{
if (str=="")
  {
  document.getElementById("txtHint_correo").innerHTML="";
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
    document.getElementById("txtHint_correo").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkcorreo.php?q="+str,true);
xmlhttp.send();
}

function checkPasswords(){
  if (document.getElementById("txt_clave").value != document.getElementById("txt_clavec").value){
    document.getElementById("txtHint_clave").innerHTML = "Verifique confirmacion de contrase&ntilde;a";
  } else {
    document.getElementById("txtHint_clave").innerHTML = "";
  }
}

function checkEmails(){
    if (document.getElementById("txt_correoc").value != document.getElementById("txt_correo").value)
    {
      document.getElementById("txtHint_correoch").innerHTML = "Verifique confirmacion de correo electronico";
    } else {
      document.getElementById("txtHint_correoch").innerHTML = "";
    }
}
</script>
</head>
<body>
  <table border="1" align="center">
    <tr>
      <td><a href="registro_int.php">Interno</a></td>
      <td><a href="registro_ext.php">Externo</a></td>
    </tr>
  </table>
<form name="registro_externo" action="registrar_ext.php" method="post">
<table align="center">
  <tr>
  <td><label>Nombre:</label></td>
  <td><input type="text" name="txt_nombre" required></td>
  </tr>
  <br>
  <tr>
  <td><label>Apellidos:</label></td>
  <td><input type="text" name="txt_apellidos" required></td>
  </tr>
  <br>
  <tr>
  <td><label>Contrase&ntilde;a:</label></td>
  <td><input type="password" name="txt_clave" id="txt_clave" required ></td>
  </tr>
  <br>
  <tr>
  <td><label>Confirmar Contrase&ntilde;a:</label></td>
  <td><input type="password" name="txt_clavec" id="txt_clavec" onblur="checkPasswords()" required></td>
  </tr>
  <tr>
  <td><div id="txtHint_clave"><b></b></div></td>
  </tr>
  <br>
  <tr>
  <td><label>Institucion:</label></td>
  <td><input type="text" name="txt_inst" required></td>
  </tr>
  <br>
  <tr>
  <td><label>Correo electronico:</label>
  <td><input type="text" name="txt_correo" id="txt_correo" onkeyup="checkCorreo(this.value)" required/>
  </tr>
  <br>
  <tr>
  <td><label>Confirmar Correo electronico:</label>
  <td><input type="text" name="txt_correoc" id="txt_correoc" onblur="checkEmails()" required/></td>
  </tr>
  <br>
  <tr>
    <td><label>Tipo de Asistencia:</label></td>
    <td>
      <select name="tipo_asistenca">
        <option value=null select>SELECT</option>
        <option value="0">Por conferencia</option>
        <option value="1">Por dia</option>
        <option value="2">Evento completo</option>
      </select>
    </td>
  </tr>
  <tr>
  <td><div id="txtHint_correo"><b></b></div></td>
  </tr>
  <tr>
  <td><div id="txtHint_correoch"><b></b></div></td>
  </tr>
  <tr>
    <td><input type="submit"/></td>
    <td><input type="reset"/></td>
  </tr>
</table>
</form>
</body>
</html>