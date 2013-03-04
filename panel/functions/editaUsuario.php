<?php
	require("../../Classes/users.php");
	$id_user = $_POST['id'];
	$ap_paterno = strtr(strtoupper($_POST["apellidoPaterno"]),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
	$ap_materno = strtr(strtoupper($_POST["apellidoMaterno"]),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
	$nombre = strtr(strtoupper($_POST["nombre"]),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	$us = new users();
	$us -> update_user($nombre, $ap_paterno, $ap_materno, $direccion, $telefono, $id_user);

	echo "Cambios realizados satisfactoriamente.<br />";
	
	echo "<br /><a href='#' id='regresar'>Regresar</a>";
	
?>
	<script type="text/javascript">
	$("#regresar").click(function () { 
       $.post('functions/detalle.php',{id: <?php echo $id_user?>},function (data){
			$("#principal").html("");
			$("#principal").append(data);
		});
	});
    </script>