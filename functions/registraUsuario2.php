<?php
	require("../Classes/mysql.php");
	require("../Classes/sendmail.php");
	
	
	$db = new mysql(); 
	$db->connect(); 
	$db->select(); 
	
	$nombre = $_POST['nombres'];
	$idUser = $_POST['idUser'];

	for ($i=0; $i < 5; $i++) 
	{
		$sql="INSERT INTO Emails (email_name) VALUES ('$nombre[$i]');";
		$db->query($sql);
		$lastId = mysql_insert_id();
        $sql2="INSERT INTO User_emails (id_user, id_email , id_email_type) VALUES ($idUser,$lastId,1);";	
        $db->query($sql2);
	}
	$sql3="UPDATE Users SET complete='1' WHERE id_user='$idUser';";
	$db->query($sql3);
	
	if(isset($db))$db->close();
	
	
	$apellidoPaterno = $_POST["apellidoPaterno"];
	$apellidoMaterno = $_POST["apellidoMaterno"];
	$contrasena = $_POST["contrasena"];
	$nombrecompleto = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$ciudad = $_POST["ciudad"];
	$estado = $_POST["estado"];
	$telefono = $_POST["telefono"];
	$correo = $_POST["correo"];
	$date = date('Y-m-d');
	$nombre_dominio = $_POST["apellidoPaterno"].$_POST["apellidoMaterno"];
	
	$cad = "<br /><b>Apellido paterno</b>: ".$apellidoPaterno
	."<br /><b>Apellido materno</b>: ".$apellidoMaterno
	."<br /><b>Nombre(s)</b>: ".$nombrecompleto
	."<br /><b>Dirección</b>: ".$direccion
	."<br /><b>Teléfono de contacto</b>: ".$telefono
	."<br /><b>Correo alterno</b>: ".$correo;
	
	for($i=0; $i < 5; $i++)
	{
		$cad.= "<br /><b>Correo ".($i+1)."</b>: ".$nombre[$i];
	}
	
	$sm = new sendmail(); 
	$sm->set_to($correo); 
	$sm->set_subject("Petición FamilyMail");
	$sm->set_msg($cad); 
	$sm->set_content_type();
	$sm->set_from("soporte@familymail.com.mx"); 
	echo $sm->send_w_headers();
?>