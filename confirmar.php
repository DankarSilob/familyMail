<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FamilyMail.com.mx - Forma de registro</title>
<script type="text/javascript">
</script>
</head>

<body>

<h2>Forma de pago</h2>
<form name="pago" id="pago" action="confirmar.php" onsubmit="return validar_nombres()" >
<p>Realice el pago por Internet en dineromail.com. Haga clic en "Enviar Pago" para realizar el pago de su correo personalizado.</p>
<input type="button" value="Regresar" onclick="esconder()" /><br />
<input type="submit" value="Enviar pago" />

</form>
<script type="text/javascript">
function esconder()
	{
		$(document).ready(function(){
			$('#pago').hide();
			$('#mail_form').show();
			});
	}
</script>
<?php

?>
</body>
</html>