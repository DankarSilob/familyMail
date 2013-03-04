<?php
	require("../../Classes/users.php");
	$id = $_POST['id'];
	$us = new users();
	$arr = $us->getInfoUser($id);
	$nombre = $arr['first_name'];
	$ap_paterno = $arr['last_name_p'];
	$ap_materno = $arr['last_name_m'];
	$direccion = $arr['address'];
	$telefono = $arr['phone'];
	$correo = $arr['alt_email'];
	
	echo '<h2>Editar información</h2><form id="form">
<label>Nombre</label><input name="nombre" id="nombre" type="text" value="'.$nombre.'" size="30" /><br />
<label>Apellido Paterno</label><input name="ap_paterno" id="ap_paterno" type="text" value="'.$ap_paterno.'" size="30" /><br />
<label>Apellido Materno</label><input name="ap_materno" id="ap_materno" type="text" value="'.$ap_materno.'" size="30" /><br />
<label>Dirección</label><input name="direccion" id="direccion" type="text" value="'.$direccion.'" size="30" /><br />
<label>Teléfono</label><input name="telefono" id="telefono" type="text" value="'.$telefono.'" size="30" /><br />
<input name="envio" id="envio" type="button" value="Enviar"><br />
<input type="hidden" name="email_info" id="email_info" value="X" autocomplete="off" />
</form>';
//<label>Correo-e alterno</label><input name="correo" id="correo" type="text" value="'.$correo.'" size="30" /><br />
?>

<script type="text/javascript">

$(document).ready(function(){
	jQuery.validator.addMethod("latincharonly", function(value, element) { 
		return this.optional(element) || /^[a-zA-Z áéíóúüAÉÍÓÚÜÑñ]+$/.test(value);}, "Please only letters.");
	jQuery.validator.addMethod("latindircharonly", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\d\.# áéíóúüAÉÍÓÚÜÑñ/-]+$/.test(value); 
}, "Please only letters, numbers, #, - or /.");
	$("#form").validate({
		rules: {
			'ap_paterno': {required:true , minlength : 3, latincharonly: true },
			'ap_materno': {required:true , minlength : 3, latincharonly: true },
			'nombre': {required:true , minlength : 3, latincharonly: true },
			'direccion': { required:true, latindircharonly: true },
			'telefono': { required: true, number: true , maxlength: 14}
			},
		messages : {
			'ap_paterno': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
			'ap_materno': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
			'nombre': {required:'Campo obligatorio' , minlength : 'Mínimo de 3 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
			'direccion': {required:'Campo obligatorio', latindircharonly: 'Hay un caracter inválido' },
		   	'telefono': { required: 'Campo obligatorio', number: 'Ingrese solamente dígitos', maxlength: 'Máximo 14 dígitos' }
			}
			});
});

/*
$("#envio").click(function(){
			if($("#form").valid()){
				//entra aqui si no hay errores
				sendForm();
			}*/		
$("#envio").click(function(){
	if($("#form").valid()){
				/*$.post('../functions/verifyEmail.php',{email: $("#correo").val()},function (data){
					var d = data;
					console.log($("#email_info").val());
					$("#email_info").val(d);
					var comp = $("#email_info").val();
					console.log(comp);
					if(comp==0){
						alert("Esta dirección de correo ya está registrada en el sistema.");
					}
					else{
		*/
		sendForm();
			//		}
			//	});
			}
		});

function sendForm()
	{
		$.post('functions/editaUsuario.php', {
			id: <?php echo $id?>,
			apellidoPaterno : $("#ap_paterno").val(),
			apellidoMaterno : $("#ap_materno").val(),
			
			nombre : $("#nombre").val(),
			direccion : $("#direccion").val(),
			
			telefono : $("#telefono").val(),
			//correo : $("#correo").val()
			} , function (data) {
				 
				$("#principal").html("");
				$("#principal").append(data);
				 
			})
	}
</script>