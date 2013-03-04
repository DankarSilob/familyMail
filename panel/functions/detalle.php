<?php
	require("../../Classes/users.php");
	
	$id = $_POST['id'];
	$us = new users();
	
	$usuario = $us -> getInfoUser($id);
	$cuentas = $us -> getAccountsInfo($id);
	$status = $us -> getStatus($id);
	
	echo '<h2>Detalles del Usuario</h2><p><b>Status:</b> '.$status."</p>".
	"<p><b>Nombre del Usuario:</b> ".$usuario['first_name']." ".$usuario['last_name_p']." ".$usuario['last_name_m']."</p><p><b>Cuentas:</b></p>".$cuentas;
?>