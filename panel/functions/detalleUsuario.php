<?php
	//require("../../Classes/mysql.php");
	require("../../Classes/users.php");
	
	$id = $_POST['id'];
	$us = new users();
	$arr = $us->getInfoUser($id);
	//
	//echo $usu.'<a id="terminar" href="#" onclick="cerrar()">Cerrar</a>';
	$nombre = $arr['first_name'];
	$ap_paterno = $arr['last_name_p'];
	$ap_materno = $arr['last_name_m'];
	$direccion = $arr['address'];
	$telefono = $arr['phone'];
	$correoe = $arr['alt_email'];
	echo '<h2>Detalles del Usuario</h2>'.
	
	'<p><b>Nombre:</b> '.$nombre.' '.$ap_paterno.' '.$ap_materno.'</p><p><b>Dirección:</b> '.$direccion.'</p><p><b>Teléfono:</b> '.$telefono.'</p><p><b>Correo alterno:</b> '.$correoe.'</p>'	
	.'<a id="editar" href="#">Editar Información</a>';
echo '<script type="text/javascript">
	$(document).ready(function() 
    { 
		$(\'#editar\').click(function () {
			$.post(\'functions/editInfo.php\',{id: "'.$id.'", name: "'.$nombre.'", lastp: "'.$ap_paterno.'", lastm: "'.$ap_materno.'", address: "'.$direccion.'", phone: "'.$telefono.'", email: "'.$correoe.'"},function (data){
			$(\'#principal\').empty();
			$(\'#principal\').append(data);
		});
		
		});
    });
</script>';
	
?>
