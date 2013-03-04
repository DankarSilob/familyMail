<?php
	require("../../Classes/users.php");
	$id = $_POST['id'];
	$us = new users();
	$arr = $us->getPwdUser($id);
	$pwd = $arr['pwd'];
	
	echo '<h2>Editar Password</h2><form id="formPWD">

<label>Nueva contraseña</label><input name="contrasena1" id="contrasena1" type="password" size="30" autocomplete="off" /><br />
<label>Repetir contraseña</label><input name="contrasena2" id="contrasena2" type="password" size="30" autocomplete="off" /><br />
<input name="envio" id="envio" type="button" value="Enviar"><br />
</form>';
?>

<script type="text/javascript">
$(document).ready(function () {
	  $("#formPWD").validate({
      	 rules: {
			
			'contrasena1': {required : true, minlength: 6, maxlength: 15},
            'contrasena2': {required : true, equalTo: '#contrasena1'}
		},
         messages : {
			
			'contrasena1': {required:'Campo obligatorio' , minlength : 'Mínimo de 6 caracteres', maxlength: 'Máximo de 15 caracteres' },
			'contrasena2': {required : 'Campo obligatorio', equalTo: 'Las contraseñas no coinciden'}
		}
      });
	$("#envio").click(function(){
			if($("#formPWD").valid()){
				console.log("Todo esta bien");
				sendForm();
			}
			else
				console.log("Error");
		});	
    });
	function sendForm()
	{
		$.post('functions/editaPassword.php', {
			id: <?php echo $id?>,
			
			contrasena1 : $("#contrasena1").val()
			} , function (data) {
				 
				$("#principal").html("");
				$("#principal").append(data); 
			});
	}
</script>