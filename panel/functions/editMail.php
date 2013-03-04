<?php
	require("../../Classes/users.php");
	$id = $_POST['id'];
	$us = new users();
	$arr = $us->getMail($id);
	$mail = $arr['alt_email'];
	echo '<h2>Editar Correo-e</h2><form id="formMAIL">
<label>Nueva dirección de correo-e alterna</label><input name="nvo_correo" id="nvo_correo" type="text" size="30" autocomplete="off" /><br />
<input type="hidden" name="email_info" id="email_info" value="'.$mail.'" autocomplete="off" />
<input name="envio" id="envio" type="button" value="Enviar"><br />
</form>';
?>
<script type="text/javascript">
$(document).ready(function ()
{
	$("#formMAIL").validate(
	{
		rules:
		{
			'nvo_correo':
			{
				required: true, email: true
			}
		},
		messages :
		{
			'nvo_correo':
			{
				required: 'Campo obligatorio', email: 'El correo no es válido'
			}
		}
	});
	
	$("#envio").click(function()
	{
	if($("#formMAIL").valid())
		{
		console.log($("#nvo_correo").val() +" "+ $("#email_info").val());
		$.post('../functions/verifyEmail.php',
			{
				email: $("#nvo_correo").val()
			},
			function (data)
			{
				//console.log("Valor de email_info: " + data);
				//var d = data;
				//console.log("Valor actual debe ser 1 (true): " + comp);
				//$("#email_info").val(data);
				var comp = data;
				console.log("Valor actual de comp, debe ser 1 (true): " + comp);
				if ( $("#nvo_correo").val() != $("#email_info").val() )
				{
					if(comp==0)
					{
						alert("Esta dirección de correo ya está registrada en el sistema.");
					}
					else
					{
						console.log("Todo esta bien");
						sendForm();
					}
				}
				else
				{
              			console.log("Ingresó la misma dirección de correo-e!");
				}
			});
		}
	});
});

function sendForm()
{
	$.post('functions/editaMail.php',
	{
		id: <?php echo $id?>,	
		mail1 : $("#nvo_correo").val()
	},
	function (data)
	{		 
		$("#principal").html("");
		$("#principal").append(data); 
	});
}
</script>