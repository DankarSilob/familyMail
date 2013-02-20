<!DOCTYPE HTML>
<html>
<head>
<title>Panel de administracion LABNET</title>
<meta charset="UTF-8" />
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
</head>

<body>
<form class="box login">
  <fieldset class="boxBody">
    <label>Username</label>
    <input type="text" id="user"  tabindex="1" required>
    <label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>
    <input type="password" id="password" tabindex="2" required>
     <div id="mensajeError" style="display:none">Acceso denegado</div>
  </fieldset>
  <footer>
    <label><input type="checkbox" tabindex="3">Recordarme</label>
    <input type="button" class="btnLogin" value="Login" tabindex="4" onclick="login()">
  </footer>
</form>
<footer id="main">
</footer>
</body>
<script type="text/javascript">
  function login()
  {
    var user = $("#user").val();
    var password = $("#password").val();
    //functions/admin/login.php
	$.post("../functions/admin/login.php",{username: user, password : password}, function(response){
      if(response==1){
      	document.location.href = 'main.php' ;
    	}
		else
		{
			$("#mensajeError").show();
		}
    })
  }
</script>
</html>
