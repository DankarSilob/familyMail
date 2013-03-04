<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login - Family Mail</title>
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/create.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>
<body>
<form method="post" id="signup">
	<label class="input span">
		<span>Correo</span>
		<input type="text" id="login_user" /></label><br/>	
	<label class="input span">
		<span>Contraseña</span>
		<input type="password" id="login_password" /></label><br/>
		<div id="mensajeError" style="display:none">Datos incorrectos. Intente nuevamente.</div>
    <label class="input">
	<input id="submit2" type="button" class="btnLogin" value="Iniciar" onclick="login()" /></label>
</form>

<script type="text/javascript">
  (function($) {
    function toggleLabel() {
        var input = $(this);
        setTimeout(function() {
            var def = input.attr('title');
            if (!input.val() || (input.val() == def)) {
                input.prev('span').css('visibility', '');
                if (def) {
                    var dummy = $('<label></label>').text(def).css('visibility','hidden').appendTo('body');
                    input.prev('span').css('margin-left', dummy.width() + 3 + 'px');
                    dummy.remove();
                }
            } else {
                input.prev('span').css('visibility', 'hidden');
            }
        }, 0);
    };

    function resetField() {
        var def = $(this).attr('title');
        if (!$(this).val() || ($(this).val() == def)) {
            $(this).val(def);
            $(this).prev('span').css('visibility', '');
        }
    };

    $('input, textarea').live('keydown', toggleLabel);
    $('input, textarea').live('paste', toggleLabel);
    $('select').live('change', toggleLabel);

    $('input, textarea').live('focusin', function() {
        $(this).prev('span').css('color', '#ccc');
    });
    $('input, textarea').live('focusout', function() {
        $(this).prev('span').css('color', '#999');
    });

    $(function() {
        $('input, textarea').each(function() { toggleLabel.call(this); });
    });

})(jQuery);
  
  function login()
  {
    var user = $("#login_user").val();
    var password = $("#login_password").val();
	$.post("functions/login.php",{username: user, password : password}, function(response){
		
      if(response>0){
      	document.location.href = 'panel' ;
    	}
		else
		{
			$("#mensajeError").show();
			console.log(response);
		}
    })
  }
</script>
</body>

</html>

