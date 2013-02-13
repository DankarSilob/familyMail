<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FamilyMail.com.mx - Forma de registro</title>
<script type="text/javascript">
</script>
</head>

<body>

<h2>Usuario adicional</h2>
<form name="xtramail_form" id="xtramail_form" action="confirmar.php" onsubmit="return validar_nombres()" style="display:none;">
<p>El registro de un usuario adicional implica un cargo de 50 pesos.</p>
<input type="button" value="Cancelar" onclick="esconderxtra()" /><br />
<input type="submit" value="Enviar pago" />
</form>
<script type="text/javascript">
function esconderxtra()
	{
		$(document).ready(function(){
			$('#xtramail_form').hide();
			$('#mail_form').show();
			});
	}
</script>
<?php

?>
</body>
</html>