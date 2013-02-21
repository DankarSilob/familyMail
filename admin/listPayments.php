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


<script type="text/javascript" src="../js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.pager.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="./css/style.css" type="text/css" />
<h2>Pagos</h2>

<div id="container">
</div>

<script type="text/javascript">
	function nuevaTabla()
	{
		 $('#container').load("paymentsTable.php");
	}
	
	$(document).ready(function() 
    { 
		$.post('functions/paymentsTable.php',{},function (data){
			$("#container").html="";
			$("#container").append(data);
		});
	
        $("#myTable")
		.tablesorter({widthFixed: true, widgets: ['zebra']})
		.tablesorterPager({container: $("#pager")});
    });
</script>

