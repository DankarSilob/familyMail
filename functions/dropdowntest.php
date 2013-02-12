<html>
<head>
<title>Autodropdown</title>
</head>
<body>
<?php

//DB connection
require("../Classes/mysql.php");
$db = new mysql();
$db->connect();
$db->select();
$opcs="";
$sql="SELECT * FROM States";
$result=mysql_query($sql) or die (mysql_error());
while($row = mysql_fetch_assoc($result))
{
	$opcs.='<option value=\"'.$row['id_state'].'\">'.$row['state_name'].'</option>';
}
if(isset($db))$db->close();
//echo $options 
?>
<select name="estado" id="estado" onChange="sel_city(2)"> 
<option value=""></option>
<?php echo $opcs; ?>
</select>

<select name="municipio" id="estado"> 
<option value=""></option>
<?php echo $opcs2; ?>
<option>...mas municipios?</option>
</select>

<script>
function sel_city(x){
	<?php 
	
	?>
	}
</script>
</body>
</html>


 