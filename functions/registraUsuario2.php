<?php
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
?>