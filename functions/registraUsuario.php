<?php
	require("../Classes/mysql.php");
	$apellidoPaterno = $_POST["apellidoPaterno"];
	$apellidoMaterno = $_POST["apellidoMaterno"];
	$contrasena = $_POST["contrasena"];
	$nombre = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$ciudad = $_POST["ciudad"];
	$estado = $_POST["estado"];
	$telefono = $_POST["telefono"];
	$correo = $_POST["correo"];
	$date = date('Y-m-d');
	$nombre_dominio = $_POST["apellidoPaterno"].$_POST["apellidoMaterno"];
	$idUser = $_POST["idUser"];
	//instanciamos la clase mysql
	$db = new mysql(); // instanciamos el objeto para la conexion
	$db->connect(); //CONECTAMOS A LA BASE DE DATOS
	$db->select(); // seleccionamos base de datos default
	$sql="INSERT INTO Users (first_name, last_name_p, last_name_m, address, city, state_, phone, alt_email, password, cut_off_date, status, complete)
 VALUES
  ('$nombre','$apellidoPaterno','$apellidoMaterno', '$direccion', '$ciudad', '$estado', '$telefono', '$correo', '$contrasena', '$date', '1', '0' );";
	$db->query($sql); // corremos el query
	$lastid = mysql_insert_id();
	$sql2="INSERT INTO User_domain (id_user,name_domain,active) VALUES ('$lastid','$nombre_dominio','1');";
	$db->query($sql2);// query para registrar nombre de dominio
	$lastid2 = mysql_insert_id();
	//update para poner dominio
	$sql3="UPDATE Users SET domain_name = $lastid2 WHERE id_user = $lastid;";
	$db->query($sql3);// query para registrar nombre de dominio
	if(isset($db))$db->close(); //cerramos la conexion si existe
	echo $lastid;
?>