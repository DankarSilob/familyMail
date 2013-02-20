<?php
require("../../Classes/mysql.php");

function checarLogin($user,$pass){
	$db = new mysql(); // instanciamos el objeto para la conexion
	$db->connect(); //CONECTAMOS A LA BASE DE DATOS
	$db->select(); // seleccionamos base de datos default
	$sql="SELECT id_userAdministrador FROM usersAdministrador WHERE username='$user' AND PASSWORD='$pass'"; 
	$consulta = $db->execute($sql);
	$numRows = $db->numOfRows($consulta);
	
	 if($numRows>0){  
	 $acceso=1;
	 return $acceso;
	 }
	 else{
	 $acceso=0;
	 return $acceso; 
	 }
}


session_start();
$username = $_POST['username']; 
$password= $_POST['password']; 
$acceso = checarLogin($username,$password);
 
if($acceso == 0)
	{
		echo "denegado";

	}
	else
	{
		$_SESSION["valid_user"] = 1 ;
		echo $acceso;
	}
?>