<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>FamilyMail.com.mx - Forma de registro</title>
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/create.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />

</head>
<body id="main_body" >

<div id="form_container">
<form id="signup" method="post">
				<h2>Inscribirse</h2>
					<label class="input span">
  						<span>Nombre(s)</span>
   						<input type="text" name="nombre" id="nombre" /></label><br/>	
   					<label class="input span">
  						<span>Apellido Paterno</span>
   						<input type="text" name="ap_paterno" id="ap_paterno" onchange="available()"/></label><br/>	
   					<label class="input span">
  						<span>Apellido Materno</span>
   						<input type="text" name="ap_materno" id="ap_materno" onchange="available()" /></label><br/>	
   					<label class="input span">
   						<span>Dominio</span>
   						<input type="text" name="dominio" id="dominio" readonly/></label><br/>
   					<label>
   						<input id="submit3" type="button" value="Ver disponiblidad de dominio" /></label>
   					<label class="input span">
   					    <span>Contraseña</span>
   						<input type="password" name="contrasena" id="contrasena"/></label><br/>
   					<label class="input span">
   					    <span>Repetir Contraseña</span>
   						<input type="password" name="contrasena2" id="contrasena2" /></label><br/>
   					<label class="input span">
   					    <span>Dirección</span>
   						<input type="text" name="direccion" id="direccion" /></label><br/>
   					<label class="input span">
   					    <span>Teléfono (Clave Lada + Número)</span>
   						<input type="text" name="telefono" id="telefono" /></label><br/>
   					<label class="input span">
   					    <span>Correo</span>
   						<input type="text" name="correo" id="correo" /></label><br/>
   					<label class="input span">
                    	<span><!--Captcha--></span>
                        <input type="hidden" name="txtCaptcha" id="txtCaptcha" /></label><br />
                     <label class="input span">
                        <span>Escriba el código</span>
                        
   						<input type="text" name="txtInput" id="txtInput" autocomplete="off"/></label><br/>
   						<label><br />
                        <input type="hidden" name="idUser" id="idUser" />
					    <input type="hidden" name="email_info" id="email_info" value="X" autocomplete="off" />
                        <span id="txtCaptchaDiv">&nbsp;</span><br />
                        <script type="text/javascript">generar();</script><br style="clear:both;"/>
   						<input id="submit" type="button" value="Siguiente" /></label>

				</form>
    <span id="result" style="display:none">SUCCESS</span>
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


 $(document).ready(function () {
     
	 console.log("Inciando en " + $("#email_info").val());
	 
	 
	 
	 
	 
	  //agregar nueva regla: solo caracteres del alfabeto castellano
	jQuery.validator.addMethod("latincharonly", function(value, element) { 
  return this.optional(element) || /^[a-zA-Z áéíóúüAÉÍÓÚÜÑñ]+$/.test(value); 
}, "Please only letters.");
	jQuery.validator.addMethod("latindircharonly", function(value, element) { 
  return this.optional(element) || /^[a-zA-Z\d\.# áéíóúüAÉÍÓÚÜÑñ/-]+$/.test(value); 
}, "Please only letters, numbers, #, - or /.");


	  $("#signup").validate({
      	 rules: {
           'ap_paterno': {required:true , minlength : 2, latincharonly: true },
           'ap_materno': {required:true , minlength : 2, latincharonly: true },
		   'nombre': {required:true , minlength : 2, latincharonly: true },
		   'direccion': { required:true, latindircharonly: true },
		   'dominio': { required:true },
		   'estado': { required:true },
		   'ciudad': { required:true },
           'telefono': { required: true, number: true , maxlength: 14},
           'correo': { required: true, email: true },
           'contrasena': {required : true, minlength: 6, maxlength: 15},
           'contrasena2': {required : true, equalTo: '#contrasena'},
		   'txtInput': {required : true, equalTo: '#txtCaptcha'}                      
           },
          messages : {
          'ap_paterno': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
           'ap_materno': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
		   'nombre': {required:'Campo obligatorio' , minlength : 'Mínimo de 2 caracteres', latincharonly: 'Solamente caracteres alfabéticos' },
		   'direccion': {required:'Campo obligatorio', latindircharonly: 'Hay un caracter inválido' },
		   'dominio': {required:'Campo obligatorio'},
		   'estado': {required:'Campo obligatorio'},
		   'ciudad': {required:'Campo obligatorio'},
           'telefono': { required: 'Campo obligatorio', number: 'Ingrese solamente dígitos', maxlength: 'Máximo 14 dígitos' },
           'correo': { required: 'Campo obligatorio', email: 'El correo no es válido' },
           'contrasena': {required : 'Campo obligatorio', minlength: 'Campo mínimo 6 caracteres', maxlength: 'Máximo 15 caracteres'},
           'contrasena2': {required : 'Campo obligatorio', equalTo: 'Las contraseñas no coinciden'},
		   'txtInput': {required : 'Campo obligatorio', equalTo: 'El código no coincide'} 			   
          }

      });
		$("#submit").click(function(){
			if($("#signup").valid()){
				$.post('functions/verifyEmail.php',{email: $("#correo").val()},function (data){
					var d = data;
					$("#email_info").val(d);
					var comp = $("#email_info").val();
					console.log(comp);
					if(comp==0)
					{
					alert("Esta dirección de correo ya está registrada en el sistema.");
					}
					else{
						console.log("Todo esta bien");
						sendForm();
					}
					
				});
			}
		});
		
		/*
		$.post('functions/dropdown.php',{op :1 , estado : '0' },function (data){
			$("#estado").append(data);
			onChangeEstado();
		});
		*/
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
			ciudad : $("#ciudad").val(),
			telefono : $("#telefono").val(),
			correo : $("#correo").val()
			} , function (data) {
				 $("#idUser").val(data);
				//aqui iria el load al paso  2...
				 $('#result').show();
				 $('#result').load("registro2.php");
				 $('#signup').hide();
			})
	}

		function onChangeEstado()
	{
		$.post('functions/dropdown.php',{op : 2 , estado : $("#estado").val() },function (data){
			$("#ciudad").html('');

			$("#ciudad").append(data);
		});
	}
		//function probarEmail(em){
			
		//}
</script>
</div>
</body>
</html>