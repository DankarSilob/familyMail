<?php
	require("../Classes/mysql.php");
	$apellidoPaterno = $_POST["apellidoPaterno"];
	$apellidoMaterno = $_POST["apellidoMaterno"];
	$contrasena = $_POST["contrasena"];
	$nombre = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$estado = $_POST["estado"];
	$municipio = $_POST["municipio"];
	$telefono = $_POST["telefono"];
	$correo = $_POST["correo"];
	$date = date('Y-m-d');
	$nombre_dominio = $_POST["apellidoPaterno"].$_POST["apellidoMaterno"];

	//$dominio = $apellidoPaterno.$apellidoMaterno;
	//$fecha_de_corte = '2012-12-31';
//conexión a BD: use nombre de servidor, nombre de usuario y contraseña
//no es bueno hacer esto ya que estas re escribiendo informacion que tenemos en el archivo de configuacion
///////////////$con = mysql_connect("50.116.84.66","labnet_db","LABNET1");

//instanciamos la clase mysql
$sql="INSERT INTO Users
 VALUES
  ('','$nombre','$apellidoPaterno','$apellidoMaterno', '$direccion', '$municipio', '$estado', '$telefono', '$nombre_dominio', '$contrasena', '$date', '1', '0' );";
$db = new mysql(); // instanciamos el objeto pra la conexion

$db->connect(); //CONECTAMOS A LA BASE DE DATOS
$db->select(); // eleccionamos base de datos default
$db->query($sql); // corremos el query
$lastIDUSer = mysql_insert_id();
if(isset($db))$db->close(); //cerramos la conexion si existe
echo $lastIDUSer;
?>