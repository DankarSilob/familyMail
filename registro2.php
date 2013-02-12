<<<<<<< HEAD
=======
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FamilyMail.com.mx - Forma de registro</title>
<script type="text/javascript">
</script>
</head>

<body>

>>>>>>> Actualización 8 - Feb - 2013
<h2>Creación del correo familiar</h2>
<!--Usuarios Normales-->
<form name="mail_form" id="mail_form" action="confirmar.php" onsubmit="return validar_nombres()" >
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
<input type="button" value="Agregar a otro miembro" onclick="agregar_miembro()" /><br />
<input type="button" value="Regresar" onclick="esconder()" /><br />
<input type="button" id="envio2" value="Enviar Nombres" />

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
      $("#mail_form").validate({
      	 rules: {
           'nombre1': {required:true , minlength : 3 },
           'nombre2': {required:true , minlength : 3 },
           'nombre3': {required:true , minlength : 3 },
		   'nombre4': {required:true , minlength : 3 },
           'nombre5': {required:true , minlength : 3 }
		   },
          messages : {
           'nombre1': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres' },
		   'nombre2': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres' },
		   'nombre3': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres' },
		   'nombre4': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres' },
		   'nombre5': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres' } 			   
          }

      });
		$("#envio2").click(function(){
			if($("#mail_form").valid()){
				//entra aqui si no hay errores en mail_form
				sendForm();
			}
		});
    });
	function sendForm()
	{
<<<<<<< HEAD
		var arrayNombres = new Array();
			arrayNombres.push($("#nombre1").val());
			arrayNombres.push($("#nombre2").val());
			arrayNombres.push($("#nombre3").val());
			arrayNombres.push($("#nombre4").val());
			arrayNombres.push($("#nombre5").val());
		$.post('functions/registraUsuario2.php', {nombres  : arrayNombres, idUser : $("#idUser").val()
=======
		$.post('functions/registraUsuario2.php', {
			nombre1 : $("#nombre1").val()+"@dominiodeprueba.COM",
			nombre2 : $("#nombre2").val()+"@dominiodeprueba.COM",
			nombre3 : $("#nombre3").val()+"@dominiodeprueba.COM",
			nombre4 : $("#nombre4").val()+"@dominiodeprueba.COM",
			nombre5 : $("#nombre5").val()+"@dominiodeprueba.COM"
>>>>>>> Actualización 8 - Feb - 2013
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
<<<<<<< HEAD
=======

<?php
>>>>>>> Actualización 8 - Feb - 2013

