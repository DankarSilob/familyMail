<?php
include "../Classes/mysql.php";
session_start();
if (!$_SESSION["valid_user"])
    {
    Header("Location: ../");
    }

?>
<!DOCTYPE html>
<html>
<head>
<title>Panel de Control - FamilyMail</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.pager.js"></script>
</head>

<body>
<div id="contenedor">
	<div id="cabecera"><!--<img src="img/gear.png" width="119" height="106">-->Panel de Control</h1></div>
	<div id="cuerpo">
	<div id="menu15">
    	<ul>
       <!-- use la clase "primero" y "ultimo" para saber donde empieza y donde terminan los elementos de la lista y redondear sus border y que se vean igual que la caja que los contiene, si se añaden elementos de lista el primero siempre debe llevar la clase "primero" y el ultimo "ultimo" -->
    	 	<li><a id="informacion" href="#" class="primero">Información</a></li>
			<li><a id="perfil" href="#">Editar Perfil</a></li>
			<li><a id="c_correo" href="#">Cambiar Correo</a></li>
            <li><a id="c_contrasena" href="#">Cambiar Contraseña</a></li>
            <li><a id="salir" href="../logout.php" class="ultimo">Salir</a></li>
		</ul>
	</div>
	<div id="principal">

   </div>
  </div>
  <br>

</div> 
<div id="pie">
	<!--<img src="img/LabNET.png" width="163" height="55">--></div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$("#informacion").click(function () { 
       $.post('functions/detalle.php',{id: <?php echo $_SESSION["valid_id"]?>},function (data){
			$("#principal").html("");
			$("#principal").append(data);
		});
	});
	$("#perfil").click(function () { 
       $.post('functions/editInfo.php',{id: <?php echo $_SESSION["valid_id"]?>},function (data){
			$("#principal").html("");
			$("#principal").append(data);
		});
	});
	$("#c_contrasena").click(function () { 
         $.post('functions/editPwd.php',{id: <?php echo $_SESSION["valid_id"]?>},function (data){
			$("#principal").html("");
			$("#principal").append(data);
		});
	});
	$("#c_correo").click(function () {
        $.post('functions/editMail.php',{id: <?php echo $_SESSION["valid_id"]?>},function (data){
			$("#principal").html("");
			$("#principal").append(data);
		});
	});
	$.post('functions/detalle.php',{id: <?php echo $_SESSION["valid_id"]?>},function (data){
			$("#principal").html("");
			$("#principal").append(data);
		});
});
</script>
</html>