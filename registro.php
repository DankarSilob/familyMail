<?php
$connect = mysql_connect("50.116.84.66","labnet_db","LABNET1") or die ("Could not connect.");
mysql_select_db("labnet_familyMail") or die ("Could not find database");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>FamilyMail.com.mx - Forma de registro</title>
<<<<<<< HEAD
=======
<!--<link rel="stylesheet" type="text/css" href="vista.css" media="all">-->

<script type="text/javascript">
function reload(form)
{
var selected_value=form.est.options[form.est.options.selectedIndex].value;
//demodropdownbox --> registro
self.location.href='registro.php?est=' + selected_value;   
}

</script>

>>>>>>> Actualización 8 - Feb - 2013
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/create.js"></script>
</head>
<body id="main_body" >

<div id="form_container">
<h1><a>Family Mail</a></h1>
<form id="form" action="#" method="post" onsubmit="return checkform(this);">
    
	<h2>Forma de Registro</h2>
	<p>Ingrese los siguientes datos, todos los espacios son requeridos.</p>
	<p>
      <label for="nombre">Nombre(s)</label>
      <input type="text" name="nombre" id="nombre" size="30" />
    </p>
	<p>
      <label for="ap_paterno">Apellido Paterno</label>
      <input type="text" name="ap_paterno" id="ap_paterno" size="30" />
    </p>
	<p>
      <label for="ap_materno">Apellido Materno</label>
      <input type="text" name="ap_materno" id="ap_materno" size="30" />
    </p>
	<input type="button" value="Ver disponibilidad de dominio" onclick="available()" />
    <!--<input type="button" value="Ver disponibilidad de dominio" />-->
    <span id="disponib">-</span>
<<<<<<< HEAD
=======
    <!--Dominio-->
	<!--
	<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "http://www.whoisxmlapi.com/whoisserver/WhoisService?cmd=GET_DN_AVAILABILITY&domainName="+$("#ap_paterno").val()+$("#ap_materno").val()+".com",
			dataType: "xml",
			success: function(xml){
				$(xml).find('AVAILABLE').each(function(){
					var id= $(this).attr('id');
					var title = $(this).find('title').text();
					var url = $(this).find('url').text();
					$('<div class="items" id="link_'+id+'"></div>').html('<a href="'+url+'">'+title+'</a>').appendTo('#disponib');

				});
			}
		});
	});
	</script>
	-->
	<!--Fin verif. dominio-->
>>>>>>> Actualización 8 - Feb - 2013
	<p>
      <label for="contrasena">Contraseña</label>
      <input type="password" name="contrasena" id="contrasena" size="30" />
    </p>
	<p>
      <label for="contrasena2">Repetir contraseña</label>
      <input type="password" name="contrasena2" id="contrasena2" size="30" />
    </p>
	<p>
      <label for="direccion">Dirección</label>
      <input type="text" name="direccion" id="direccion" size="30" />
    </p>
<<<<<<< HEAD
    <p>
    	<label for="estado">Estado</label>
    	<select id="estado" name="estado" onChange="onChangeEstado()"></select>
    	<select id="ciudad" name="ciudad"></select>
    </p>
=======
<!--INICIAN DROPDOWN LISTS DINAMICOS-->
<?php
@$est=$HTTP_GET_VARS['est'];
if(strlen($est) > 0 and !is_numeric($est)){ 
echo "INVALID DATA.";
exit;
}
//This fetches content from car estados table first to get the AUDI,BMW,PORSCHE, SAAB list
 
$estados_query=mysql_query("SELECT * FROM States"); 
 
if(isset($est) and strlen($est) > 0)
{
 
// If the numeric value of "est" (selected cities of states) is greater than zero we are OK
// Then we will perform an SQL query to find all car cities with that number.
$cities_query=mysql_query("SELECT * FROM Cities WHERE state_id = '$est'"); 
}
// 
 // estado cambiado por est
echo "<select name='est' onchange='reload(this.form)'><option value=''>-Estado-</option>";
 
while($qresult_estados = mysql_fetch_array($estados_query)) 
{ 
if($qresult_estados['id_state']==@$est){
	echo "<option selected value='".$qresult_estados['id_state']."'>".$qresult_estados['state_name']."</option>"."<br />";}
else{
	echo "<option value='".$qresult_estados['id_state']."'>".$qresult_estados['state_name']."</option>";}
}
echo "</select>";
echo "<select name='municipio'><option value=''>-Ciudad-</option>";
 
while($qresult_cities = mysql_fetch_array($cities_query)) 
{ 

echo  "<option value='".$qresult_cities['id_city']."'>".$qresult_cities['name_city']."</option>";
}
echo "</select>";
//
mysql_close($connect);
?>	
<!--TERMINAN DROPDOWN LISTS DINAMICOS-->
>>>>>>> Actualización 8 - Feb - 2013
	<p>
      <label for="telefono">Teléfono de contacto (Clave Lada + Número)</label>
      <input type="text" name="telefono" id="telefono" size="30" />
    </p>
	<p>
      <label for="correo">Correo-e</label>
      <input type="text" name="correo" id="correo" size="30" />
    </p>
	
	<p>
      <label for="code">Escriba el siguiente código: <span id="txtCaptchaDiv" style="color:#F00">####</span><!-- codigo generado automaticamente --> 
      <input type="hidden" id="txtCaptcha" /></label><!-- codigo en casilla oculta -->
      <input type="text" name="txtInput" id="txtInput" size="30" autocomplete="off" /><!--coloca el codigo que ve en rojo aqui-->
	  
	  <script type="text/javascript">generar();</script>
    </p>
<<<<<<< HEAD
	<input type="hidden" id="idUser">
=======
	
>>>>>>> Actualización 8 - Feb - 2013
    <input type="button" id="envio" value="Enviar"   />
	</form>
    <span id="result" style="display:none">SUCCESS</span>
<script type="text/javascript">
 $(document).ready(function () {
      //agregar nueva regla: solo caracteres del alfabeto castellano
	jQuery.validator.addMethod("latincharonly", function(value, element) { 
  return this.optional(element) || /^[a-zA-Z áéíóúüAÉÍÓÚÜÑñ]+$/.test(value); 
}, "Please only letters.");
	jQuery.validator.addMethod("latindircharonly", function(value, element) { 
  return this.optional(element) || /^[a-zA-Z\d# áéíóúüAÉÍÓÚÜÑñ/-]+$/.test(value); 
}, "Please only letters, numbers, #, - or /.");


	  $("#form").validate({
      	 rules: {
           'ap_paterno': {required:true , minlength : 3, latincharonly: true },
           'ap_materno': {required:true , minlength : 3, latincharonly: true },
		   'nombre': {required:true , minlength : 3, latincharonly: true },
		   'direccion': { required:true, latindircharonly: true },
		   'estado': { required:true },
		   'municipio': { required:true },
           'telefono': { required: true, number: true , maxlength: 14},
           'correo': { required: true, email: true },
           'contrasena': {required : true, minlength: 6, maxlength: 15},
           'contrasena2': {required : true, equalTo: '#contrasena'},
		   'txtInput': {required : true, equalTo: '#txtCaptcha'}                      
           },
          messages : {
          'ap_paterno': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
           'ap_materno': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
		   'nombre': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
		   'direccion': {required:'Campo obligatorio', latindircharonly: 'Hay un caracter inválido' },
		   'estado': {required:'Campo obligatorio'},
		   'municipio': {required:'Campo obligatorio'},
           'telefono': { required: 'Campo obligatorio', number: 'Ingrese solamente dígitos', maxlength: 'Máximo 14 dígitos' },
           'correo': { required: 'Campo obligatorio', email: 'El correo no es válido' },
           'contrasena': {required : 'Campo obligatorio', minlength: 'Campo mínimo 6 caracteres', maxlength: 'Máximo 15 caracteres'},
           'contrasena2': {required : 'Campo obligatorio', equalTo: 'Las contraseñas no coinciden'},
		   'txtInput': {required : 'Campo obligatorio', equalTo: 'El código no coincide'} 			   
          }

      });
		$("#envio").click(function(){
			if($("#form").valid()){
				//entra aqui si no hay errores
				sendForm();
			}
		});
		$.post('functions/dropdown.php',{op :1 , estado : '0' },function (data){
			$("#estado").append(data);
			onChangeEstado();
		});
    });
	function sendForm()
	{
		$.post('functions/registraUsuario.php', {
			apellidoPaterno : $("#ap_paterno").val(),
			apellidoMaterno : $("#ap_materno").val(),
			contrasena : $("#contrasena").val(),
			nombre : $("#nombre").val(),
			direccion : $("#direccion").val(),
			estado : $("#estado").val(),
			municipio : $("#municipio").val(),
			telefono : $("#telefono").val(),
			correo : $("#correo").val()
			} , function (data) {
<<<<<<< HEAD
				 $("#idUser").val(data);
=======
				 console.log(data);
>>>>>>> Actualización 8 - Feb - 2013
				//aqui iria el load al paso  2...
				 $('#result').show();
				 $('#result').load("registro2.php");
				 $('#form').hide();
			})
<<<<<<< HEAD
	}

		function onChangeEstado()
	{
		$.post('functions/dropdown.php',{op : 2 , estado : $("#estado").val() },function (data){
			$("#ciudad").html('');
			
			$("#ciudad").append(data);
		});
	}


=======
}
>>>>>>> Actualización 8 - Feb - 2013
</script>
<div id="footer">
	&copy; 2013, FamilyMail.com.mx
</div>
</div>
</body>
</html>