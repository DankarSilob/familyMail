<?php
	//require("../configuracion/connectionSettings.php");
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
	




//conexión a BD: use nombre de servidor, nombre de usuario y contraseña
//no es bueno hacer esto ya que estas re escribiendo informacion que tenemos en el archivo de configuacion
///////////////$con = mysql_connect("50.116.84.66","labnet_db","LABNET1");

//instanciamos la clase mysql
$sql="INSERT INTO Users
 VALUES
  ('','$nombre','$apellidoPaterno','$apellidoMaterno', '$direccion', '$municipio', '$estado', '$telefono', '', '', '', '' );";
$db = new mysql();


$db->connect(); //CONECTAMOS A LA BASE DE DATOS
echo $sql;
$db->select(); // SELECCIONAMOS LA BASE DE DATOS POR DEFAULT
$db->query($sql);
if(isset($db))$db->close(); //cerramos la conexion si existe




//verificar que se haya realizado correctamente la conexión
// if(!$con)
// 	{
// 	die('Error con la conexión. '.mysql_error());
// 	}
// //código aquí
// //seleccionar BD
// mysql_select_db("labnet_familymail",$con);
// //ingresar datos en BD seleccionada
// //en este caso, la tabla Users tiene como columnas: id_user, first_name, last_name_p, last_name_m, address, city, state_, phone, domain_name, password, cut_off_date, status.

// //Ejecutar consulta
// if(!mysql_query($sql,$con))
// 	{
// 	die ('Error: '.mysql_error());	
// 	}
// echo "<div style='color:black'>Agregado</div>";
// //Cerrar conexión
// mysql_close($con);

?>