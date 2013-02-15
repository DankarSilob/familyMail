<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Forma de registro</title>
</head>
<body>
<?php
require("Classes/sendmail.php");
$ap_paterno = $_POST["ap_paterno"];
$ap_materno = $_POST["ap_materno"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$estado = $_POST["estado"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$cad = "<br /><b>Apellido paterno</b>: ".$ap_paterno."<br /><b>Apellido materno</b>: ".$ap_materno."<br /><b>Nombre(s)</b>: ".$nombre."<br /><b>Dirección</b>: ".$direccion."<br /><b>Ciudad</b>: ".$ciudad."<br /><b>Estado</b>: ".$estado."<br /><b>Teléfono de contacto</b>: ".$telefono."<br /><b>Correo alterno</b>: ".$correo;
$sm = new sendmail(); 
$sm->set_to($correo); 
$sm->set_subject("Petición FamilyMail");
$sm->set_msg($cad); 
$sm->set_content_type();
$sm->set_from("soporte@familymail.com.mx"); 
echo $sm->send();
echo "enviado...";
?>
</body>
</html>