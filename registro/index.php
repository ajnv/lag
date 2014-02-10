<html>
<head>
<script>
function checkMatricula(str)
{
if (str=="")
  {
  document.getElementById("txtHint_matricula").innerHTML="";
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
    document.getElementById("txtHint_matricula").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkmatricula.php?q="+str,true);
xmlhttp.send();
}

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

function checkOption(str){
  if (str == "1"){
    document.getElementById("lb_matricula").hidden = false;
    document.getElementById("txt_matricula").hidden = false;
    document.getElementById("txt_matricula").required = true;
     document.getElementById("txt_institucion").required = false;
    document.getElementById("lb_institucion").hidden = true;
    document.getElementById("txt_institucion").hidden = true;
  }
  else if (str == "0"){
    document.getElementById("lb_matricula").hidden = true;
    document.getElementById("txt_matricula").hidden = true;
    document.getElementById("txt_matricula").required = false;
    document.getElementById("txt_matricula").value = "";
    document.getElementById("txt_institucion").required = true;
    document.getElementById("lb_institucion").hidden = false;
    document.getElementById("txt_institucion").hidden = false;
  }
  else{
    document.getElementById("lb_matricula").hidden = true;
    document.getElementById("txt_matricula").hidden = true;
    document.getElementById("txt_matricula").required = false;
    document.getElementById("txt_matricula").value = "";
    document.getElementById("txt_institucion").required = false;
    document.getElementById("lb_institucion").hidden = true;
    document.getElementById("txt_institucion").hidden = true;
  }
}
</script>
</head>
<body>
<form name="registro_interno" action="registrar_int.php" method="post">
<table align="center" id="registro">
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
  <td><input type="password" name="txt_clave" id="txt_clave" required></td>
  </tr>
  <br>
  <tr>
  <td><label>Confirmar Contrase&ntilde;a:</label></td>
  <td><input type="password" name="txt_clavec" id="txt_clavec" onblur="checkPasswords()" required ></td>
  </tr><tr>
  <td><div id="txtHint_clave"><b></b></div></td>
  </tr>
  <br>
  <tr>
  <td><label>Correo electronico:</label>
  <td><input type="text" name="txt_correo" id="txt_correo" onkeyup="checkCorreo(this.value)" required/></td>
  </tr>
  <br>
  <tr>
  <td><label>Confirmar Correo electronico:</label>
  <td><input type="text" name="txt_correoc" id="txt_correoc" onblur="checkEmails()" required/></td>
  </tr>
  <br>
  <tr>
  <td><div id="txtHint_correo"><b></b></div></td>
  </tr>
  <tr>
  <td><div id="txtHint_correoch"><b></b></div></td>
  </tr>
  <tr>
    <td><label>Soy alumno de la UPSLP?</label></td>
    <td>
      <select name="alumno" id="alumno" onchange="checkOption(this.value)" required>
        <option value="" selected>Seleccionar</option>
        <option value="1">Si</option>
        <option value="0">No</option>
      </select>
    </td>
  </tr>
  <tr>
   <td><label id="lb_matricula" hidden="true">Matricula:</label></td>
   <td><input type="text" name="txt_matricula" id="txt_matricula" maxlength="6" onkeyup="checkMatricula(this.value)" required="false" hidden="true"/></td>
  </tr>
  <tr>
  <td><div id="txtHint_matricula"><b></b></div></td>
  </tr>
  <tr>
  <tr>
   <td><label id="lb_institucion" hidden="true">Institucion:</label></td>
   <td><input type="text" name="txt_institucion" id="txt_institucion" maxlength="15" required="false" hidden="true"/></td>
  </tr>
  <tr>
    <td><input type="submit"/></td>
    <td><input type="reset"/></td>
  </tr>
</table>
</form>
</body>
</html>