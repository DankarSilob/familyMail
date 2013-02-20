<?php
include "../Classes/mysql.php";
session_start();
if (!$_SESSION["valid_user"])
    {
    // Usuario que no ha ingresado, redirige a página de ingreso.
    Header("Location: index.php");
    }
	// Contenido solo para administrador
	/*echo "<p><a href=\"logout.php\">Haga clic aquí para salir...</a></p>";*/
?>
<!--Aquí iba el pager-->

<script type="text/javascript" src="../js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.pager.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="./css/style.css" type="text/css" />
<h2>Usuarios de FamilyMail</h2>
Filtrar por:
<select id="status_type" onChange="nuevaTabla()" >
		<option value="TODOS" selected="selected">Todos</option>
		<option value="PENDIENTE">Pendiente</option>
		<option value="EXPIRADO">Expirado</option>
		<option value="POR VENCER">Por vencer</option>
		<option value="PAGADO">Pagado</option>
</select>
<div id="container">
</div>
<div id="container_detail" style="background-color:white; font-size:10px; padding:15px; margin-top:30px; ">
</div>
<script type="text/javascript">
	function nuevaTabla()
	{
		 $('#container').load("usersTable.php");
	}
	function desplegar_info(v){
		//alert(v);
		//otro post y usar el no. de id para desplegar más datos:
		$.post('functions/user_detail.php',{id : v},function(data){
			
			$('#container_detail').html('');
			$('#container_detail').append(data);
			});
		}
	$(document).ready(function() 
    { 
		$.post('functions/usersTable.php',{status : "TODOS"},function (data){
			$("#container").append(data);
		});
	
        $("#myTable")
		.tablesorter({widthFixed: true, widgets: ['zebra']})
		.tablesorterPager({container: $("#pager")});
    });
</script>
