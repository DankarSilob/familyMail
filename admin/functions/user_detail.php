<?php
	require("../../Classes/mysql.php");
	//!
	function renglon($nombre, $ap_paterno, $ap_materno, $direccion, $telefono, $correoe){
		return '<p><b>Nombre:</b> '.$nombre.' '.$ap_paterno.' '.$ap_materno.'</p><p><b>Dirección:</b> '.$direccion.'</p><p><b>Teléfono:</b> '.$telefono.'</p><p><b>Correo alterno:</b> '.$correoe.'</p>';
		}
	
	$id = $_POST['id'];
	$usu="";
	
	//$q="SELECT first_name, last_name_p, last_name_m, (SELECT nextCuttDate FROM Payments WHERE id_user = Users.id_user ORDER BY id_payment DESC LIMIT 0,1) as next_payment FROM Users ORDER BY next_payment;";
	$q = "SELECT id_user, first_name, last_name_p, last_name_m, address, phone, alt_email FROM Users WHERE id_user = '$id' LIMIT 0,1";
	
	$db = new mysql();
	$db->connect();
	$db->select();
	$result=mysql_query($q) or die (mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
		$usu.= renglon($row['first_name'], $row['last_name_p'], $row['last_name_m'],$row['address'],$row['phone'],$row['alt_email']);
		}
	//
	//echo $usu.'<a href="#" onclick="cerrar()">Cerrar</a>';
	echo $usu;
echo '<script type="text/javascript">
	function cerrar()
	{
		$("#container_detail").hide();
	}
</script>';
	if(isset($db))$db->close();
?>