
<html>
<head>
<script src="prototype.js" type="text/javascript"></script>
		<script src="effects.js" type="text/javascript"></script>
		<script type="text/javascript" src="fabtabulous.js"></script>
		<script type="text/javascript" src="validation.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css" />
        
 <script type="text/javascript"><!--  
 //<![CDATA[  
function comprobar(mail)   
{  
  var url = 'comprobar.php';  
  var pars= ("email=" + mail); 
  var myAjax = new Ajax.Updater( 'comprobar_mensaje', url, { method: 'get', parameters: pars});  
}  

function comprobarm(matricula)   
{  
  var url = 'comprobarm.php';  
  var pars= ("matricula=" + matricula); 
  var myAjax = new Ajax.Updater( 'comprobar_matricula', url, { method: 'get', parameters: pars});  
}  
// -->  
</script>         
  
        </head>
        
        
        
 <form id="test" action="insertar.php" method="post">
					<fieldset>
						<legend>Registro</legend>
						
           
           <div class="form-row">
							<div class="field-label"><label for="nombre">Nombre</label>:</div>
							<div class="field-widget"><input name="nombre" id="nombre" class="required validate-alphanum" /></div>
						</div>
           <div class="form-row">
							<div class="field-label"><label for="apellido">Apellidos</label>:</div>
							<div class="field-widget"><input name="apellido" id="apellido" class="required validate-alphanum" /></div>
						</div>
           
           
           
           
           
           
           
						</div>
						<div class="form-row">
							<div class="field-label"><label for="password">Password</label>:</div>
							<div class="field-widget"><input type="password" name="password" id="password" class="required validate-password" title="Enter a password greater than 6 characters" /></div>
						</div>
						<div class="form-row">
							<div class="field-label"><label for="cpassword">Confirm Password</label>:</div>
							<div class="field-widget"><input type="password" name="cpassword" id="cpassword" class="required validate-password-confirm"  /></div>
						</div>
						<div class="form-row">
							<div class="field-label"><label for="institucion">instituci&oacute;n</label>:</div>
							<div class="field-label">
								<input name="institucion" id="field3" />		
							</div>
						</div>
                        
                        
<div class="form-row">
	  <div class="field-label"><label for="email">Email</label>:<div id="comprobar_mensaje"></div></div>
							<div class="field-label">
                              
                              <input name="email" id="email" onKeyUp="comprobar(this.value)" class="required validate-email" />  
							</div>
						</div>  
                        <div class="form-row">
							<div class="field-label"><label for="cemail">Confirmar Email</label>:</div>
							<div class="field-label">
								<input name="cemail" id="cemail" class="required validate-confirm-email" />		
							</div>
						</div>  
                                              

						
						<p><a href="#" onclick="$('upslp').toggle(); return false">Soy alumno de la UPSLP</a></p>
						<div id="upslp" class="form-row" style="display:none;">
							<div class="field-label"><label for="matricula">Matricula</label>:<div id="comprobar_matricula"></div></div>
							<div class="field-widget"><input name="matricula" id="matricula" class="required validate-number" onKeyUp="comprobarm(this.value)" title="Optional: Enter your email address" /></div>
						</div>
					</fieldset>
					<input type="submit" value="Registrar" /> <input type="reset" value="Reset" onclick="valid.reset(); return false" />
					</form>
					<script type="text/javascript">
						function formCallback(result, form) {
							window.status = "valiation callback for form '" + form.id + "': result = " + result;
						}
						
						var valid = new Validation('test', {immediate : true, onFormValidate : formCallback});
						Validation.addAllThese([
							['validate-password', 'Tu password debe tener al menos 7 caracteres y no debe ser \'password\', \'1234567\' o tu nombre', {
								minLength : 7,
								notOneOf : ['password','PASSWORD','1234567','0123456'],
								notEqualToField : 'nombre'
							}],
							['validate-password-confirm', 'Los passwords no coinciden por favor intentetalo de nuevo.', {
								equalToField : 'password'
							}],
							
							['validate-confirm-email', 'Los emails no coinciden por favor intentetalo de nuevo.', {
								equalToField : 'email'
							}]
							
						]);
					</script>
				</div>
				<div class="panel" id="using-titles">
					<form id="test2" action="#" method="get">
						<fieldset>
							<legend>Form</legend>
							<div class="form-row">
								<div class="field-label"><label for="field1-t2">Name</label>:</div>
								<div class="field-widget"><input name="field1-t2" id="field1-t2" class="required" title="Enter your name. This is a required field" /></div>
							</div>
							<div class="form-row">
								<div class="field-label"><label for="field3-t2">Employee Number</label>:</div>
								<div class="field-label"><input name="field3-t2" id="field3-t2" class="required validate-alphanum" title="Enter your employee number, please use only alphanumeric characters" /></div>
							</div>
							<div class="form-row">
								<div class="field-label"><label for="field4-t2">Age</label>:</div>
								<div class="field-label"><input name="field4-t2" id="field4-t2" class="validate-number" title="Optional: Enter your age, please use only numbers" /> (optional)</div>
							</div>
							<div class="form-row">
								<div class="field-label"><label for="field5-t2">Donation</label>:</div>
								<div class="field-label"><input name="field5-t2" id="field5-t2" class="validate-currency-dollar" title="Optional: Enter a dollar amount for donation" /> (optional)</div>
							</div>
						</fieldset>
						<input type="submit" value="Submit" /> <input type="button" value="Reset" onclick="valid2.reset(); return false" />
					</form>
					<script type="text/javascript">
						var valid2 = new Validation('test2', {useTitles:true});
					</script>
				</div>
				<div class="panel" id="no-element-ids">
					<form id="test3" action="#" method="get">
						<fieldset>
							<legend>Form</legend>
							<div class="form-row">
								<div class="field-label"><label for="field1-t3">Name</label>:</div>
								<div class="field-widget"><input name="field1-t3" class="required" title="Enter your name. This is a required field" /></div>
							</div>
							<div class="form-row">
								<div class="field-label"><label for="field2-t3">Employee Number</label>:</div>
								<div class="field-label"><input name="field2-t3" class="required validate-alphanum" title="Enter your employee number, please use only alphanumeric characters" /></div>
							</div>
							<div class="form-row">
								<div class="field-label"><label for="field3-t3">Age</label>:</div>
								<div class="field-label"><input name="field3-t3" class="validate-number" title="Optional: Enter your age, please use only numbers" /> (optional)</div>
							</div>
							<div class="form-row">
								<div class="field-label"><label for="field4-t3">Donation</label>:</div>
								<div class="field-label"><input name="field4-t3" class="validate-currency-dollar" title="Optional: Enter a dollar amount for donation" /> (optional)</div>
							</div>
						</fieldset>
						<input type="submit" value="Submit" /> <input type="button" value="Reset" onclick="valid3.reset(); return false" />
					</form>
					<script type="text/javascript">
						var valid3 = new Validation('test3');
					</script>
				</div>
		</div>
        
        
        
        <span id="comprobar_mensaje"></span>
		<script type="text/javascript">
			new Fabtabs('tabs');
		</script>
	</body>
</html>