<html>
<head><title>Autodropdown</title></head>
<body>
<?php
/*
//DB connection
require("../Classes/mysql.php");
$db->connect();
$db->select();

$sql="SELECT * FROM States;";
$db = new mysql();

$db->query($sql);
//$result=mysql_query($sql); 
$result = query($sql);
if(isset($db))$db->close();
 */


$result = array('rojo','verde','azul','amarillo');
$options=""; 
/*
while ($row=mysql_fetch_array($result)) { 
    $id=$row["id"]; 
    $thing=$row["thing"]; 
    $options.="<option value=\"$id\">".$thing; 
} 
*/

//Option 2

foreach ($result as $key => $name){
	$options.='<option value=\"'.$key.'"\>'.$name.'</option>';
}
/*
$v = 32;
$sql2 = "SELECT * FROM Cities WHERE id_state = '".$v."';";
$options2 = "";
$result2 = query($sql2);
foreach ($result2 as $cve => $nombre){
	$options2.='<option value=\"'.$key.'"\>'.$name.'</option>';
}
*/
?>
<select name="thing"> 
<option value="-1">select something...</option>
<?php echo $options ?> 
</select>
</body>
</html>

 