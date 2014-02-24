<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title>D.I.E.Z. LAG</title>
<meta name="description" content="">
<meta name="José García">

<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/style.css" />
<!-- Google Font Code -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet" media="screen">
<link href="css/transitions.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<style type="text/css"></style>
<!-- Enable this css if you want to override styles-->
<!--<link href="css/override.css" rel="stylesheet" media="screen">-->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Favicon and Apple Icons -->
<link rel="shortcut icon" href="../img/icons/favicon.ico">
<link rel="apple-touch-icon" href="../img/icons/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="../img/icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="../img/icons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="../img/icons/apple-touch-icon.png">
<script type="text/javascript" src="js/modernizr-1.0.min.js"></script>




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
xmlhttp.open("GET","checarmail.php?q="+str,true);
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

    document.getElementById("lb_nombre").hidden = true;
    document.getElementById("lb_apellidos").hidden = true;
    document.getElementById("txt_nombre").hidden = true;
    document.getElementById("txt_apellidos").hidden = true;
    document.getElementById("txt_nombre").required = false;
    document.getElementById("txt_apellidos").required = false;

    document.getElementById("lb_correo").hidden = true;
    document.getElementById("lb_correoc").hidden = true;
    document.getElementById("txt_correo").hidden = true;
    document.getElementById("txt_correoc").hidden = true;
    document.getElementById("txt_correo").required = false;
    document.getElementById("txt_correoc").required = false;

    document.getElementById("txtHint_correo").innerHTML = "";
    document.getElementById("txtHint_correoch").innerHTML = "";

  }
  else if (str == "0"){
    document.getElementById("lb_matricula").hidden = true;
    document.getElementById("txt_matricula").hidden = true;
    document.getElementById("txt_matricula").required = false;
    document.getElementById("txt_matricula").value = "";
    document.getElementById("txt_institucion").required = true;
    document.getElementById("lb_institucion").hidden = false;
    document.getElementById("txt_institucion").hidden = false;

    document.getElementById("lb_nombre").hidden = false;
    document.getElementById("lb_apellidos").hidden = false;
    document.getElementById("txt_nombre").hidden = false;
    document.getElementById("txt_apellidos").hidden = false;
    document.getElementById("txt_nombre").required = true;
    document.getElementById("txt_apellidos").required = true;

    document.getElementById("lb_correo").hidden = false;
    document.getElementById("lb_correoc").hidden = false;
    document.getElementById("txt_correo").hidden = false;
    document.getElementById("txt_correoc").hidden = false;
    document.getElementById("txt_correo").required = true;
    document.getElementById("txt_correoc").required = true;

    document.getElementById("txtHint_matricula").innerHTML = "";
  }
  else{
    document.getElementById("lb_matricula").hidden = true;
    document.getElementById("txt_matricula").hidden = true;
    document.getElementById("txt_matricula").required = false;
    document.getElementById("txt_matricula").value = "";
    document.getElementById("txt_institucion").required = false;
    document.getElementById("lb_institucion").hidden = true;
    document.getElementById("txt_institucion").hidden = true;

    document.getElementById("lb_nombre").hidden = true;
    document.getElementById("lb_apellidos").hidden = true;
    document.getElementById("txt_nombre").hidden = true;
    document.getElementById("txt_apellidos").hidden = true;
    document.getElementById("txt_nombre").required = false;
    document.getElementById("txt_apellidos").required = false;

    document.getElementById("lb_correo").hidden = true;
    document.getElementById("lb_correoc").hidden = true;
    document.getElementById("txt_correo").hidden = true;
    document.getElementById("txt_correoc").hidden = true;
    document.getElementById("txt_correo").required = false;
    document.getElementById("txt_correoc").required = false;

    document.getElementById("txtHint_correo").innerHTML = "";
    document.getElementById("txtHint_correoch").innerHTML = "";
    document.getElementById("txtHint_matricula").innerHTML = "";
  }
}
</script>





















</head>

<body background="img/pattern7.png" onLoad="initialize()">



<!-- start HEADER -->
<section id="top" class="page-block">
  <header id="home">
    <div class="container clearfix">
      <div class="navigation">
        <div class="row">
          <div class="col-md-2 col-sm-3">
            <h1 class="logo"><a href="index.html"><img class="img-responsive" src="img/logo.png" alt="OnEvent"></a></h1>
          </div>
          <div class="col-md-10 col-sm-9"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar navbar-default navbar-header" role="navigation">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navigation"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <nav>
              <ul id="Navigation" class="list-inline collapse navbar-collapse">
                <li><a href="#schedule" title="Schedule">EVENTO E INSCRIPCIONES</a></li>
                <li><a href="#speakers" title="Speakers">PONENTES</a></li>
                <li><a href="#partners" title="Partners">PATROCINADORES</a></li>
                <li><a href="#faq" title="FAQ">PREGUNTAS FRECUENTES</a></li>
                <li><a href="#venue" title="Venue">SEDE</a></li>
                <li><a href="#footer" title="Subscribe to Our Newsletter">CONTACTO</a></li>
              </ul>
            </nav>
          </div>
          <!-- end col-md-10 --> 
        </div>
        <!--end-row--> 
      </div>
      <!-- end navigation --> 
    </div>
    <!-- end container --> 
  </header>
  <div id="event-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner"> 
      <!-- begin carousel-slide -->
      <div class="item active"> <img src="img/2.png"
      alt="slide" class="img-responsive"> </div>
      <!-- end carousel-slide --> 
      <!-- begin carousel-slide -->
      <div class="item"> <img src="img/1.png"
      alt="slide" class="img-responsive"> </div>
      <!-- end carousel-slide --> 
      <!-- begin carousel-slide -->
      <div class="item"> <img src="img/3.png"
      alt="slide" class="img-responsive"> </div>
      <!-- end carousel-slide --> 
    </div>
    <!-- end carousel-inner --> 
    
    <!-- Controls --> 
    <a class="left carousel-control" href="#event-slider" data-slide="prev"> <i class="fa fa-chevron-left"></i></a> <a class="right carousel-control" href="#event-slider" data-slide="next"> <i class="fa fa-chevron-right"></i></a> </div>
</section>
<!-- end HEADER --> 

<!--BEGIN-INTRO-BOX-->
<section id="intro" class="page-block">
  <div class="container">
    <div class="section">
      <header class="page-head clearfix">
        <div class="row">
          <div class="col-md-10 col-sm-12 text-right">
            <div class="venue text-left">
              <h2>DECIMA SEMANA DE ADMINISTRACIÓN Y GESTIÓN</h2>
              <p class="text-muted">Instalaciones del GYM de la Universidad Politécnica de San Luis Potosí. 7, 8 y 9 de Mayo.</p>
            </div>
            
            
            <div class="countdown styled"></div>
            
            
            
            
            
          </div>
          <div class="col-md-2 col-sm-12 text-center"> <a href="#" title="Register For This Event" class="btn register-trigger"><i class="fa fa-plus-circle"></i> Registro</a>
  <h3 class="regHeading">Registrate Para <span>Este Evento</span></h3>
<form id="register" method="post" action="registrar.php">

<div class="field-wrapper">

<div class="form-row">
<label>¿Soy alumno de LAG en la UPSLP?</label>
<select name="alumno" id="alumno" onChange="checkOption(this.value)" required  >
<option value="" selected>Seleccionar</option>
<option value="1">Si</option>
<option value="0">No</option>
</select>
</div>


<div class="form-row">
<label id="lb_matricula" hidden="true"></label>
<input type="text" name="txt_matricula" id="txt_matricula" maxlength="6" onKeyUp="checkMatricula(this.value)"  hidden="true" placeholder="Matricula"/>

<div id="txtHint_matricula"><b></b></div>
</div>


<div class="form-row">
<label id="lb_institucion" hidden="true"></label>
<input type="text" name="txt_institucion" id="txt_institucion" maxlength="15" hidden="true" placeholder="Institucion" required />
</div>



<div class="form-row clearfix">
<label id="lb_nombre" hidden="true"></label>
<input type="text" name="txt_nombre" id="txt_nombre"  hidden="true" placeholder="Nombre" required />
</div>



<div class="form-row clearfix">
<label id="lb_apellidos" hidden="true"></label>
<input type="text" name="txt_apellidos" id="txt_apellidos" hidden="true" placeholder="Apellidos" required />
</div>



<div class="form-row clearfix">
<label></label>
<input type="password" name="txt_clave" id="txt_clave" placeholder="Contraseña" required/>
</div>




<div class="form-row clearfix">

<input type="password" name="txt_clavec" id="txt_clavec" onBlur="checkPasswords()" placeholder="Confirmar Contraseña" required />

<div id="txtHint_clave"><b></b></div>

<div id="txtHint_clave"><b></b></div>
</div>







<div class="form-row clearfix">
<label id="lb_correo" hidden="true"></label>
<input type="text" name="txt_correo" id="txt_correo" onKeyUp="checkCorreo(this.value)"  hidden="true" placeholder="Correo electronico" required />
</div>



<div class="form-row clearfix">
<label id="lb_correoc" hidden="true"></label>
<input type="text" name="txt_correoc" id="txt_correoc" onBlur="checkEmails()" hidden="true" placeholder="Confirmar Correo electronico" required />
<div id="txtHint_correo"><b></b></div>
<div id="txtHint_correoch"><b></b></div>

</div>


  <input type="submit" value="Enviar" class="btn btn-custom btn-lg" />


</div>










</form>          </div>
        </div>
        <!--end-row-->             











      </header>
      <article>
        <h3>¿QUIENES<span> SOMOS?</span></h3>
    <P>    La Semana de Administración es un evento académico llevado a cabo  por alumnos de la generación que comprende el  7° y 8° semestre de la Licenciatura en Administración y Gestión de la UNIVERSIDAD POLITÉCNICA DE SAN LUIS POTOSÍ. Se realiza en el mes de mayo en las instalaciones de la misma  y tiene como objetivo  reforzar los conocimientos, aptitudes y habilidades, a fines de una forma práctica y dinámica.<P>La Semana de Administración y Gestión se  integra por actividades como  Conferencias Magistrales Nacionales e Internacionales, Talleres, Foros Empresariales  e inclusive ferias de empleo.
    <P>espués de diez años de  mejorar la calidad de este magno evento, la Décima Semana de Administración y  Gestión se titula &ldquo;Un Profesionista de D.I.E.Z.&rdquo;, donde se abordarán siguientes  temas:    
    <ul type="square">
      <li>Entorno       Globalizado</li>
      <li>Modelos       de negocios</li>
      <li>Reformas       políticas de México</li>
      <li>Tecnología       fusionada con la creatividad</li>
      <li>Desarrollo       de proyectos</li>
      
    </ul>
    <P>        
    <P></article>
    </div>
    <!--end-section--> 
  </div>
</section>
<!--END-INTRO-BOX--> 

<!--BEGIN-SCHEDULE-->
<section id="schedule" class="page-block">
  <div class="container">
    <div class="section no-padding clearfix"> 
      
      <!-- Nav tabs -->
      <ul class="nav nav-tabs clearfix">
        <li class="active"><a href="#event-schedule" data-toggle="tab"><i class="fa fa-clock-o"></i>
          <h5>Inscripciones<small>Registro Interno y Externo</small></h5>
          </a></li>
        <li><a href="#promo" data-toggle="tab"><i class="fa fa-play-circle"></i>
          <h5>Consulta Programa<small>Descripción</small></h5>
          </a></li>
        <li><a href="#event-gallery" data-toggle="tab"><i class="fa fa-picture-o"></i>
          <h5>Instalaciones<small>GYM UPSLP</small></h5>
          </a></li>
        <li><a href="#exec-presence" data-toggle="tab"><i class="fa fa-star"></i>
          <h5>Comité Organizador<small>Organización</small></h5>
          </a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="event-schedule">
          <h3><i class="fa fa-clock-o"></i><span>Inscripciones</span></h3>
          <p>Registrate para en la parte superior y una vez confirmada tu sesión podras realizar el pago para el evento </p>
          <div class="row clearfix">
            <div class="col-md-4 col-sm-12 schedule-box">
              <h6 class="section-head"><span>Día 1</span>MIERCOLES</h6>
              <ul class="activities">
                <li>
                  <h6><strong> 7:30-7:50</strong>- Registro </h6>
                </li>
                <li>
                  <h6><strong>8:00 - 8:20</strong> - Inauguración </h6>
               
                </li>
                <li>
                  <h6><strong>8:20 - 8:50</strong> - Show de apertura</h6>
                 
                </li>
                
                
                 <li>
                  <h6><strong>8:50 - 10:20</strong> - L.O.S. Sueños</h6>
                 
                </li>
                
                
                 <li>
                  <h6><strong>10:20 - 10:40</strong> - Coffee break</h6>
                  
                </li>
                
                
                 <li>
                  <h6><strong>10:50 - 12:20</strong> - Carlos Llanera</h6>
           
                </li>
                
                
                 <li>
                  <h6><strong>12:20 - 13:00</strong> - Show/Expolitec</h6>
              
                </li>
                
                
                <li>
                  <h6><strong>13:00 - 15:30</strong> - Comida</h6>
              
                </li>
                <li>
                  <h6><strong>15:30 - 15:50</strong> - 2do registro</h6>
              
                </li>
                <li>
                  <h6><strong>15:50 - 17:20</strong> - Jonathan Heath</h6>
              
                </li>
                <li>
                  <h6><strong>17:20 - 18:00</strong> - Show</h6>
              
                </li>
                
                
                <li>
                  <h6><strong>18:00 - 19:30</strong> - Pendiente </h6>
              
                </li>
                
                
                
              </ul>
            </div>
            <div class="col-md-4 col-sm-12 schedule-box">
              <h6 class="section-head"><span>Día 2</span> JUEVES</h6>
              <ul class="activities">
                <li>
                  <h6><strong>7:30 - 7:50</strong> - Registro</h6>
                  
                </li>
                <li>
                  <h6><strong>8:00 - 10:00</strong> - Talleres</h6>
                  
                </li>
                <li>
                  <h6><strong>10:00 - 10:30</strong> - Coffee break </h6>
                  
                </li>
                
                <li>
                  <h6><strong>10:30 - 12:30</strong> - Talleres</h6>
                  
                </li>
                
                
                <li>
                  <h6><strong>12:30 - 14:30</strong> - L.O.S. Sueños </h6>
                  
                </li>
                <li>
                  <h6><strong>14:30 - 15:50</strong> - Comida </h6>
                  
                </li>
                
                
                
                <li>
                  <h6><strong>15:50 - 16:20</strong> - 2do registro</h6>
                  
                </li>
                
                
                
                      <li>
                  <h6><strong>16:20 - 18:00</strong> - Alejandro Camino: Softtek </h6>
                  
                </li>
                
                      <li>
                  <h6><strong>18:00 - 19:30</strong> - Fernando Botella </h6>
                  
                </li>
                    
                
                
                
                
                
                
                
                
              </ul>
            </div>
            
            
            
            
            
            
            
            <div class="col-md-4 col-sm-12 schedule-box">
              <h6 class="section-head"><span>Día 3</span> VIERNES</h6>
              <ul class="activities">
                <li>
                  <h6><strong>7:30 - 7:50</strong> - Registro</h6>
                  
                </li>
                <li>
                  <h6><strong>8:00 - 11:00</strong> - L.O.S. Sueños</h6>
                
                </li>
                <li>
                  <h6><strong>11:00 - 11:30</strong> - Coffee break</h6>
               
                </li>
               
               <li>
                  <h6><strong>11:30 - 13:30</strong> - Beto Castillo</h6>
               
                </li>
                <li>
                  <h6><strong>13:30 - 15:30</strong> - Comida</h6>
               
                </li>
                <li>
                  <h6><strong>16:00 - 17:30</strong> - Pendiente</h6>
               
                </li>
                <li>
                  <h6><strong>17:30 - 19:00</strong> - Denise Dresser</h6>
               
                </li>
                <li>
                  <h6><strong>19:00 - 19:30</strong> - Premiacion Expolitec</h6>
               
                </li>
                <li>
                  <h6><strong>19:30-19:45</strong> - Clausura</h6>
               
                </li> 
                
                  </li>
                <li>
                  <h6><strong>19:45 - 20:30</strong> - Show de Clausura</h6>
               
                </li> 
                
                
                
                
                
                
              </ul>
            </div>
          </div>
          <!--end-of-row--> 
        </div>
        <!--end-event-schedule-content-->
        
        <div class="tab-pane" id="promo">
          <h3><i class="fa fa-play-circle"></i> Video <span>Promocional</span></h3>
          
          
           
       
        </div>
        <!--end-event-schedule-content-->
        
        <div class="tab-pane" id="event-gallery">
          <h3><i class="fa fa-picture-o"></i> Galeria de  <span>Eventos Anteriores</span>
          
          
          
          
          
          FGDGDF
          
          
          
          
          
          
          
          </h3>
          <p>Descripcion de Eventos Anteriores </p>
          <div class="img-grid clearfix">
            <ul id="eg-thumbs" class="eg-thumbs clearfix">
              <li> <a href="../img/gallery/large/01.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/01.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 1</span></div>
                </a> </li>
              <li> <a href="../img/gallery/large/02.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/02.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 2</span></div>
                </a> </li>
              <li> <a href="../img/gallery/large/03.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/03.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 3</span></div>
                </a> </li>
              <li> <a href="../img/gallery/large/04.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/04.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 4</span></div>
                </a> </li>
              <li> <a href="../img/gallery/large/05.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/05.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 5</span></div>
                </a> </li>
              <li> <a href="../img/gallery/large/06.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/06.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 6</span></div>
                </a> </li>
              <li> <a href="../img/gallery/large/07.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/07.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 7</span></div>
                </a> </li>
              <li> <a href="../img/gallery/large/08.jpg" title="Event PhotoGallery" rel="prettyPhoto[gallery]"> <img src="../img/gallery/thumb/08.jpg" alt="Event Photo" class="img-responsive">
                <div class="img-caption"><span>Image Caption 8</span></div>
                </a> </li>
            </ul>
          </div>
          <!--end-img-grid--> 
          
        </div>
        <!--end-event-schedule-content-->
        
        <div class="tab-pane" id="exec-presence">
          <h3><i class="fa fa-star"></i> Comite <span>Organizador</span></h3>
          <p>Nuestro comite Organizador se ha preoupado por tener las mejores platicas con ponentes expertos en su materia, con temas actuales y de interes general  </p>
          <ul class="li-blocks">
            <li><strong>Nombre</strong> - Presidente</li>
            <li><strong>Nombre</strong> - vice</li>
 
          </ul>
        </div>
        <!--end-event-schedule-content--> 
      </div>
    </div>
  </div>
</section>
<!--END-SCHEDULE--> 

<!--BEGIN-SPEAKERS-->
<section id="speakers" class="page-block">
  <div class="container">
    <div class="section clearfix bottom-margin">
      <header class="page-head colored clearfix">
        <h2>Directorio de Ponentes en la 10 Semana de Administración y Gestión </h2>
        <p class="text-muted">Aquí podrás averiguar los perfiles de cada ponente en este evento. Próximamente descubre más conferencias. </p>
      </header>
      <article>
        <p>OBJETIVOS GENERALES DEL EVENTO Y PONENCIAS. <BR>
        <li>Proporcionar herramientas a los profesionistas para enfrentar los retos de un entorno globalizado. </li>


<li>Conocer las nuevas reformas de México y analizar el impacto directo que tiene en la administración. 
</li>
<li>Crear consciencia de la implementación de la tecnología fusionada con la creatividad, abriéndose camino en las nuevas tendencias del mercado, así como la implementación de la misma en tiempo real a los procesos administrativos.</li>

<li>Impulsar a los profesionistas a la implementación y desarrollo de sus proyectos Y Brindar al profesionista las estrategias para la consolidación de sus metas.</li>
</p>
      </article>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    <div class="row clearfix speaker-grid">
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="section no-padding">
          <figure> <img src="img/speakers/speaker1.jpg"alt="Speaker" class="img-responsive" />
            <figcaption class="speaker-info"> Es una reconocida académica , periodista, politóloga y Escritora mexicana. Denise es columnista de la revista Proceso, editorialista del periódico Reforma, y participa en la edición semanal de Reporte Índigo con su sección Código Dresser.
Es especialista en ciencias políticas, es profesora en el Instituto Tecnológico Autónomo de México (ITAM) donde ha impartido cursos de política comparada y política mexicana contemporánea desde 1991.
 </figcaption>
          </figure>
          <div class="speaker clearfix">
            <div class="col-md-10 col-sm-9 col-xs-9">
              <h6>DENISE DRESSER</h6>
              <p>Académica , Periodista y Escritora Mexicana.</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3 readIcon"> <i class="fa fa-chevron-circle-down"></i> </div>
          </div>
        </div>
      </div>
      <!--end-col-md-4-->
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="section no-padding">
          <figure> <img src="img/speakers/speaker2.jpg"alt="Speaker" class="img-responsive" />
            <figcaption class="speaker-info"> Licenciado en Ciencias de la Comunicación egresado del Tec de Monterrey donde se graduó con mención honorífica.
Fue director para Disney Special Events Group donde escribió y dirigió varios eventos en Brasil, Puerto Rico, Panamá, Inglaterra y México. 
</figcaption>
          </figure>
          <div class="speaker clearfix">
            <div class="col-md-10 col-sm-9 col-xs-9">
              <h6>BETO CASTILLO</h6>
              <p> Licenciado en Ciencias de la Comunicación.</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3 readIcon"> <i class="fa fa-chevron-circle-down"></i> </div>
          </div>
        </div>
      </div>
      <!--end-col-md-4-->
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="section no-padding">
          <figure> <img src="img/speakers/speaker3.jpg"alt="Speaker" class="img-responsive" />
            <figcaption class="speaker-info">Ing. eléctrico con maestría en administración de negocios con enfoque en finanzas.
Trabajó para Cummins generation technologies desde el 2005 hasta finales del 2013. Pasando de ingeniero en manufactura hasta convertirse en lider en excelencia operativo.
 </figcaption>
          </figure>
          <div class="speaker clearfix">
            <div class="col-md-10 col-sm-9 col-xs-9">
              <h6>CARLOS OLIVER LLANERA TREJO</h6>
              <p>Ing. eléctrico con maestría en administración de negocios con enfoque en finanzas.</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3 readIcon"> <i class="fa fa-chevron-circle-down"></i> </div>
          </div>
        </div>
      </div>
      
      
      
      
      
      <!--end-col-md-4-->
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="section no-padding no-margin">
          <figure> <img src="img/speakers/speaker4.jpg"alt="Speaker" class="img-responsive" />
            <figcaption class="speaker-info"> Somos una asociación encargada de empoderar a los jóvenes de México a través de conferencias, talleres, foros y actividades sociales para que puedan realizar sus proyectos de vida. </figcaption>
          </figure>
          <div class="speaker clearfix">
            <div class="col-md-10 col-sm-9 col-xs-9">
              <h6>L.O.S. SUEÑOS</h6>
              <p>Asociación encargada de empoderar a los jóvenes de México.</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3 readIcon"> <i class="fa fa-chevron-circle-down"></i> </div>
          </div>
        </div>
      </div>
      <!--end-col-md-4-->
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="section no-padding no-margin">
          <figure> <img src="img/speakers/speaker5.jpg"alt="Speaker" class="img-responsive" />
            <figcaption class="speaker-info">Tiene acumulado 30 años de experiencia en el análisis de la economía mexicana y sus perspectivas, tiempo durante el cual fue el Economista Principal de México para varias instituciones financieras globales y consultorías internacionales.  Empezó su carrera profesional construyendo modelos macroeconométricos para el gobierno mexicano y Wharton Econometrics.  </figcaption>
          </figure>
          <div class="speaker clearfix">
            <div class="col-md-10 col-sm-9 col-xs-9">
              <h6>JONATHAN HEATH</h6>
              <p>Doctorado en Economía, Universidad de Pennsylvania.</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3 readIcon"> <i class="fa fa-chevron-circle-down"></i> </div>
          </div>
        </div>
      </div>
      <!--end-col-md-4-->
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="section no-padding no-margin">
          <figure> <img src="img/speakers/speaker8.jpg"alt="Speaker" class="img-responsive" />
            <figcaption class="speaker-info"> <span class="center">Con más de 20 años de experiencia trabajando para proveedores de soluciones de TI, Alejandro Camino, ha dirigido el departamento de Marketing y Comunicación Global desde mayo del 2006. En su puesto actual es responsable del manejo de la comunicación corporativa a través de los Estados Unidos, Latinoamérica, Europa y Asia. </span></figcaption>
          </figure>
          <div class="speaker clearfix">
            <div class="col-md-10 col-sm-9 col-xs-9">
              <h6>ALEJANDRO CAMINO</h6>
              <p>En representación de Blanca Treviño, fundadora de Softtek.</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3 readIcon"> <i class="fa fa-chevron-circle-down"></i> </div>
          </div>
        </div>
      </div>
      <!--end-col-md-4--> 
      
      
      <br><br>
          
      
      
    </div>
    <!--end-row--> 
    
    
    
    
      
    <div class="row clearfix speaker-grid">
    <br>
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="section no-padding">
          <figure> <img src="img/speakers/speaker7.jpg"alt="Speaker" class="img-responsive" />
            <figcaption class="speaker-info">Consultor de Formación y desarrollo, y speaker profesional. Es Licenciado en Ciencias Biológicas por la Universidad de Valencia, Máster en Dirección y Administración de Empresas por ICADE y Coach Ejecutivo Diplomado por EEC (Escuela Europea de Coaching).
 </figcaption>
          </figure>
          <div class="speaker clearfix">
            <div class="col-md-10 col-sm-9 col-xs-9">
              <h6>FERNANDO BOTELLA</h6>
              <p>Licenciado en Ciencias Biológicas por la Universidad de Valencia.</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3 readIcon"> <i class="fa fa-chevron-circle-down"></i> </div>
          </div>
        </div>
      </div>
      <!--end-col-md-4-->
      
      
      
      
      
      
    
      
      
      <br><br>
          
      
      
    </div>
    <!--end-row--> 
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  </div>
  
</section>
<!--END-SPEAKERS--> 

<!--BEGIN-PARTNERS-->
<section id="partners" class="page-block">
  <div class="container">
    <div class="section">
      <header class="page-head">
        <h2>Patrocinadores</h2>
        <p class="text-muted">Empresas preocupadas por la preparacion de los jovenes que impulsan este evento</p>
      </header>
      <article>
        <p></p>
      </article>
      <div class="partner clearfix"> 
      
<a href="http://ibishotel.ibis.com/es/mexico/index.shtml" title="Ibis HOTELS, San Luis Potosí, S.L.P." target="_blank"> <img class="img-responsive" src="img/partners/4.png"  /> </a> 

<a href="http://www.pepediep.com/" title="PepeDiep" target="_blank"> <img class="img-responsive" src="img/partners/1.png"/> </a> 

<a href="https://www.facebook.com/pages/El-Dorado-Centro-Comercial/299948626696593?fref=ts" title="EL DORADO Centro Comercial" target="_blank"> <img class="img-responsive" src="img/partners/6.png" /> </a> 

<a href="#" title="Royal Prestige" target="_blank"> <img class="img-responsive" src="img/partners/3.png" /> </a> 


<a href="http://www.tortasrichard.com/" title="Tortas Richard" target="_blank"> <img class="img-responsive" src="img/partners/2.png"/> </a> 

<a href="#" title="Canal 13 San Luis Potosi. S.L.P."> <img class="img-responsive" src="img/partners/5.png"/> </a> 

</div>
</div>
  </div>
</section>
<!--END-PARTNERS--> 

<!--BEGIN-FAQ-->
n>
<!--END-FAQ--> 

<!--BEGIN-VENUE-->
<section id="venue" class="page-block">
  <div class="container">
    <div class="section clearfix bottom-margin">
      <header class="page-head colored clearfix">
        <h2>Lugar</h2>
        <p class="text-muted">Universidad Politecnica De San Luis Potosí</p>
      </header>
      <article>
        <div id="map_canvas"></div>
        <div class="row clearfix">
          <div class="col-md-3 col-sm-12 column">
            <div class="column-content">
              <h3>Ubicación <span>Del Evento</span></h3>
              <ul class="address">
<li> </li>
<li>Instalaciones del GYM de la Universidad Politécnica de San Luis Potosí.</li>
<li>Urbano Villalón 500. Predio La Ladrillera CP. 78363. San Luis Potosi S.L.P. Tel:(444) 812 63 67</li>
<li>7, 8 y 9 de Mayo.</li>
               
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 column directions-input">
            <div class="column-content">
              <h3>Obtener <span>Ruta</span></h3>
            
            </div>
          </div>
          <div class="col-md-5 col-sm-12 column directions-results">
            <div class="column-content">
              <h3>Ruta</h3>
              <div id="directionsPanel"> Ingresa tu punto de Partida en  <strong>Desde</strong> y haz click en <strong>Obtener Ruta</strong> para obtener la ruta</div>
            </div>
          </div>
        </div>
        <!--end-of-row--> 
      </article>
    </div>
  </div>
</section>
<!--END-VENUE--> 

<!--BEGIN-FOOTER-->
<footer id="footer" class="page-block">
  <div class="container">
    <div class="section no-border">
      <header class="page-head colored clearfix">
        <div class="col-md-6 col-sm-12">
          <h3>Noticias en nuestras Redes Sociales</h3>
          <a class="twitter-timeline" href="https://twitter.com/10maSemanaLAG" data-widget-id="436687567526711296">Tweets por @10maSemanaLAG</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


        </div>
        <div class="col-md-5 col-md-offset-1 col-sm-12">
          <h3>Redes sociales</h3>
          <div class="social">
            <ul class="list-inline">

              <li><a class="tips" href="https://www.facebook.com/10SemanaLAG" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a class="tips" href="https://twitter.com/10maSemanaLAG" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            
              <li><a class="tips" href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>

              

            </ul>
          </div>
          <!-- end social --> 
        </div>
      </header>
      <p class="text-center"> <span class="year"></span>  <br>
      </p>
      <a href="#top" class="top"><i class="fa fa-arrow-up fa-lg"></i></a> </div>
    <!--end-of-section--> 
  </div>
</footer>
<!--END-FOOTER--> 

<script src="js/jquery.js"></script> 
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
<script type="text/javascript" src="js/directions.js"></script> 
<script src="js/jquery.hoverdir.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/custom.js"></script> 
<script src="js/onevent.js"></script> 
<script src="js/jquery.countdown.js"></script> 
<script src="js/jquery.fitvids.js"></script>
</body>
</html>