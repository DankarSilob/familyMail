<?php
<<<<<<< HEAD
	require("../Classes/mysql.php");
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
	if(isset($db))$db->close();
=======
	//require("../configuracion/connectionSettings.php");
	require("../Classes/mysql.php");
	$nombre1 = str_replace(' ', '', $_POST["nombre1"]);
	$nombre2 = str_replace(' ', '', $_POST["nombre2"]);
	$nombre3 = str_replace(' ', '', $_POST["nombre3"]);
	$nombre4 = str_replace(' ', '', $_POST["nombre4"]);
	$nombre5 = str_replace(' ', '', $_POST["nombre5"]);
	/*$nombre1 = $_POST["nombre1"];
	$nombre2 = $_POST["nombre2"];
	$nombre3 = $_POST["nombre3"];
	$nombre4 = $_POST["nombre4"];
	$nombre5 = $_POST["nombre5"];*/
$sql="INSERT INTO Emails VALUES ('','$nombre1','1');";
$sql2="INSERT INTO Emails VALUES ('','$nombre2','1');";
$sql3="INSERT INTO Emails VALUES ('','$nombre3','1');";
$sql4="INSERT INTO Emails VALUES ('','$nombre4','1');";
$sql5="INSERT INTO Emails VALUES ('','$nombre5','1');";

// $sql.="UPDATE Users SET complete = 1 where id_user = 'LAST_INDEX';";
$db = new mysql();
$db->connect();
$db->select();
$db->query($sql);
$db->query($sql2);
$db->query($sql3);
$db->query($sql4);
$db->query($sql5);
if(isset($db))$db->close();


>>>>>>> Actualización 8 - Feb - 2013
?>