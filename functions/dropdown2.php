<?php
	//require("../configuracion/connectionSettings.php");
	require("../Classes/mysql.php");
	$mun = $_POST["mun"];

	$db = new mysql();
	$db->connect();
	$db->select();
	$opcs2="";
	$sql="SELECT * FROM Cities WHERE state_id = '$mun'";
	$result=mysql_query($sql) or die (mysql_error());
	while($row = mysql_fetch_assoc($result))
	{
		$opcs2.='<option value="'.$row['id_city'].'">'.$row['name_city'].'</option>';
	}
	if(isset($db))$db->close();
?>