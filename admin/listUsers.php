<?php
include "../Classes/mysql.php";
session_start();
if (!$_SESSION["valid_user"])
    {
    // Usuario que no ha ingresado, redirige a página de ingreso.
    Header("Location: index.php");
    }
	// Contenido solo para administrador
	$usu="";
	$q="SELECT first_name, last_name_p, last_name_m, (SELECT nextCuttDate FROM Payments WHERE id_user = Users.id_user ORDER BY id_payment DESC LIMIT 0,1) as next_payment FROM Users;";
	$db = new mysql();
	$db->connect();
	$db->select();
	$result=mysql_query($q) or die (mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
		$usu.='<tr><td>'.$row['first_name'].' '.$row['last_name_p'].' '.$row['last_name_m'].'</td><td>'.$row['next_payment'].'</td></tr>';
		}
	if(isset($db))$db->close();
	echo "<h2>Usuarios de FamilyMail</h2>";
	echo '<table><tr><th>Usuario</th><th>Fecha de corte</th></tr>'.$usu.'</table>';
	/*
	// Mostrar información de admin.
	echo "<p>ID de Usuario: " . $_SESSION["valid_id"];
	echo "<p>Nombre de Usuario: " . $_SESSION["valid_user"];
	echo "<p>Fecha de Ingreso: " . date("m/d/Y", $_SESSION["valid_time"]);
	*/
	// Mostrar liga de salida
	echo "<p><a href=\"logout.php\">Haga clic aquí para salir...</a></p>";
?>

