<?php
require("../Classes/users.php");
session_start();
$username = $_POST['username']; 
$password= $_POST['password']; 
$us = new users();
$acceso = $us -> login_user($username,$password); 
if($acceso == 0)
	{
		echo "denegado";
	}
	else
	{	
		$row = $us->getInfoUser($acceso);
		$_SESSION["valid_id"] = $row['id'];
		$_SESSION["valid_user"] = $row['first_name']." ".$row['last_name_p'];
		echo $acceso;
	}
?>