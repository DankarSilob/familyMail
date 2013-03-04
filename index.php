<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Family Mail</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<script src="js/jquery.tools.min.js"></script>
	</head>
	<body>
		<div id="principal">
			<div id="banner">
        		<a href="./"><img class="left" id="logo"
        		src="img/logo.png"/></a>
       			<ul id="menu">
       				<li><a href="quienes_somos.html">¿QUIÉNES SOMOS?</a></li>
       				<li><a href="tarifas.html">TARIFAS</a></li>
       				<li><a href="contacto.html">CONTACTO</a></li>
       				<li><a href="beneficios.html">BENEFICIOS</a></li>
       			</ul>
				<div id="login">
					<a href="#" id="iniciar">Iniciar Sesión</a>
					
                    <form method="post" action="" id="post">
					<label class="input">
  						<span>Correo</span>
   						<input type="text" id="login_user" /></label><br/>	
   					<label class="input">
   					    <span>Contraseña</span>
   						<input type="password" id="login_password" /></label><br/>
   						<label class="input">
   						<input id="submit2" type="button" value="Iniciar" onclick="login()" /></label>
					</form>
				
                </div>
				<img id="linea" src="img/linea.png"/>
			</div>
			
			<div id="contenido">
				<img class="publicidad left" src="img/familia.png"/>
				<div id="div_forma"></div>
				<div class="clear"></div>
			</div>
		</div>
		<div id="pie">
			<h1>Family Mail de México, derechos reservados &copy; 2013</h1>
			
			
		</div>
			<script>
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
	$(document).ready(function(e) {
    	    $("#div_forma").load("registro.php");
			$("#iniciar").click(function(){	
		});
			
    });
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