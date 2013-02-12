<?php
	require("../Classes/mysql.php");
	$db = new mysql();
	$db->connect();
	$db->select();
	$opcs="";
	$estado = $_POST['estado'];
	if(isset($_POST['op']))
	{
		$op = $_POST['op'];
	}
	else 
	{
		$op = $_POST['op'];
	}
	echo $op ;
	switch ($op) {
		case '1':
				$sql="SELECT * FROM States";
				//$sql="SELECT * FROM Cities WHERE state_id = 2";
				$result=mysql_query($sql) or die (mysql_error());
				while($row = mysql_fetch_assoc($result))
				{
					$opcs.='<option value="'.$row['id_state'].'">'.$row['state_name'].'</option>';
					//$opcs.='<option value="'.$row['id_city'].'">'.$row['name_city'].'</option>';
				}
				echo $opcs; 
		break;
		case '2' :
				$sql="SELECT * FROM Cities WHERE state_id = $estado";
				$result=mysql_query($sql) or die (mysql_error());
				while($row = mysql_fetch_assoc($result))
				{
					$opcs.='<option value="'.$row['id_city'].'">'.$row['name_city'].'</option>';
				}
				echo $opcs; 
		default:
			# code...
			break;
	}


	if(isset($db))$db->close();

?>
