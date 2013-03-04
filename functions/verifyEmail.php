<?php
require("../Classes/mysql.php");
$email = $_POST['email'];
$db = new mysql(); // instanciamos el objeto para la conexion
$db->connect(); //CONECTAMOS A LA BASE DE DATOS
$db->select(); // seleccionamos base de datos default
$sql="SELECT alt_email FROM Users WHERE alt_email='$email'";
$consulta = $db->execute($sql);
$numRows = $db->numOfRows($consulta);
if($numRows>0){  
			$resultado = 0;
		}
	 	else{
	 		$resultado = 1;
		}
		if(isset($db))$db->close();
echo $resultado;
?>