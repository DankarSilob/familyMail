<h2>Creación del correo familiar</h2>
<p>Ingrese los nombres de correo electrónico que desea utilizar*.</p>
<!--Usuarios Normales-->
<form name="mail_form" id="mail_form" action="#" >
<table>
<tr>
	<th>Miembro</th>
    <th>Nombre</th>
</tr>
<tr>
	<th>Padre</th>
    <td><input type="text" name="nombre1" id="nombre1" /></td>
</tr>
<tr>
	<th>Madre</th>
    <td><input type="text" name="nombre2" id="nombre2" /></td>
</tr>
<tr>
	<th>Hijo(a)</th>
    <td><input type="text" name="nombre3" id="nombre3" /></td>
</tr>
<tr>
	<th>Hijo(a)</th>
    <td><input type="text" name="nombre4" id="nombre4" /></td>
</tr>
<tr>
	<th>Hijo(a)</th>
    <td><input type="text" name="nombre5" id="nombre5" /></td>
</tr>
</table>
<!--<input type="button" value="Agregar a otro miembro" onclick="agregar_miembro()" /><br />-->
<input type="button" value="Regresar" onclick="esconder()" /><br />
<input type="button" id="envio2" value="Registrarme" />

</form>
<!--Usuario Adicional-->
<form name="xtramail_form" id="xtramail_form" action="confirmar.php" onsubmit="return validar_nombres()" style="display:none;">
<p>El registro de un usuario adicional implica un cargo de 50 pesos.</p>
<input type="button" value="Cancelar" onclick="esconderxtra()" /><br />
<input type="submit" value="Enviar pago" />
</form>
    <span id="result" style="display:none">SUCCESS</span>
<script type="text/javascript">
function esconder()
	{
		$(document).ready(function(){
			$('#mail_form').hide();
			$('#form').show();
			});
	}
function esconderxtra()
	{
		$(document).ready(function(){
			$('#xtramail_form').hide();
			$('#mail_form').show();
			});
	}
function agregar_miembro()
	{
		$(document).ready(function(){
			$('#mail_form').hide();
			$('#xtramail_form').show();
			});
	}

 $(document).ready(function () {
        //agregar nueva regla: primera letra debe ser del alfabeto, las siguientes deben ser letras y/o digitos.
		// /[a-z]^[a-z\d]+$/
	jQuery.validator.addMethod("mailname", function(value, element) { 
  return this.optional(element) || /^[a-z\d]+$/.test(value); 
}, "Please only letters.");
	  $("#mail_form").validate({
      	 rules: {
           'nombre1': {required:true , minlength : 3 , maxlength: 60 , mailname: true },
           'nombre2': {required:true , minlength : 3 , maxlength: 60 , mailname: true },
           'nombre3': {required:true , minlength : 3 , maxlength: 60 , mailname: true },
		   'nombre4': {required:true , minlength : 3 , maxlength: 60 , mailname: true },
           'nombre5': {required:true , minlength : 3 , maxlength: 60 , mailname: true }
		   },
          messages : {
           'nombre1': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', maxlength: 'Máximo de 60 caracteres', mailname: 'Nombre de correo no permitido' },
		   'nombre2': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', maxlength: 'Máximo de 60 caracteres', mailname: 'Nombre de correo no permitido' },
		   'nombre3': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', maxlength: 'Máximo de 60 caracteres', mailname: 'Nombre de correo no permitido' },
		   'nombre4': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', maxlength: 'Máximo de 60 caracteres', mailname: 'Nombre de correo no permitido' },
		   'nombre5': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', maxlength: 'Máximo de 60 caracteres', mailname: 'Nombre de correo no permitido' } 			   
          }

      });
		$("#envio2").click(function(){
			if($("#mail_form").valid()){
				//entra aqui si no hay errores en mail_form
				sendForm();
			}
		});
    });
	//
	function sendForm()
	{
		var arrayNombres = new Array();
			arrayNombres.push($("#nombre1").val());
			arrayNombres.push($("#nombre2").val());
			arrayNombres.push($("#nombre3").val());
			arrayNombres.push($("#nombre4").val());
			arrayNombres.push($("#nombre5").val());
		$.post('functions/registraUsuario2.php', {
			nombres  : arrayNombres,
			idUser : $("#idUser").val(),
			
			//
			apellidoPaterno : $("#ap_paterno").val(),
			apellidoMaterno : $("#ap_materno").val(),
			contrasena : $("#contrasena").val(),
			nombre : $("#nombre").val(),
			direccion : $("#direccion").val(),
			estado : $("#estado").val(),
			ciudad : $("#ciudad").val(),
			telefono : $("#telefono").val(),
			correo : $("#correo").val()
			//
			
			
			
			} , function (data) {
				 console.log(data);
				//aqui iria el load al paso de pago de servicio...
				 $('#result').show();
				 $('#result').load("confirmar.php");
				 $('#mail_form').hide();
				 $('#xtramail_form').hide();
			})
}
</script>