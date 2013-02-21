<!DOCTYPE html>
<html>
<head>
<title>Panel de administración</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.pager.js"></script>
</head>

<body>
<div id="contenedor">
	<div id="cabecera"><!--<img src="img/gear.png" width="119" height="106">-->Panel de Administración</div>
	<div id="cuerpo">
	<div id="menu15">
    	<ul>
       <!-- use la clase "primero" y "ultimo" para saber donde empieza y donde terminan los elementos de la lista y redondear sus border y que se vean igual que la caja que los contiene, si se añaden elementos de lista el primero siempre debe llevar la clase "primero" y el ultimo "ultimo" -->
    	 	<li><a id="usuarios" href="#" class="primero">Usuarios</a></li>
			<li><a id="tarifas" href="#">Tarifas</a></li>
			<li><a id="pagos" href="#">Pagos</a></li>
			<li><a id="administradores" href="#" class="ultimo">Administradores</a></li>
		</ul>
	</div>
	<div id="principal">
		<div style="text-align:center; width:70%; height:80%" >Bienvenido al Panel de Administación<div>
   </div>
  </div>
  <br>

</div> 
<div id="pie">
	<img src="img/LabNET.png" width="163" height="55"></div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$("#usuarios").click(function () { 
		console.log("aaa");
        $('#principal').empty().load('listUsers.php');
	});
	$("#pagos").click(function () { 
		console.log("ccc");
        $('#principal').empty().load('listPayments.php');
	});
	$("#administradores").click(function () { 
		console.log("ddd");
        $('#principal').empty().load('listAdmins.php');
	});
});
</script>
</html>