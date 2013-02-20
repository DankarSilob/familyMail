<?php
include "../../Classes/mysql.php";
session_start();
if (!$_SESSION["valid_user"])
    {
    // Usuario que no ha ingresado, redirige a página de ingreso.
    Header("Location: index.php");
    }
	// Contenido solo para administrador
	$adm="";
	$q="SELECT id_userAdministrador, username, active FROM usersAdministrador;";
	$db = new mysql();
	$db->connect();
	$db->select();
	$result=mysql_query($q) or die (mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
		$x = ($row['active'] == 1)?'Activo':'Inactivo';
		$adm.='<tr><td>'.$row['id_userAdministrador'].'</td><td>'.$row['username'].'</td><td>'.$x.'</td></tr>';
		}
	if(isset($db))$db->close();
	//echo "<h2>Administradores</h2>";
	echo '<div id=\'smart-paginator\'><table id=\'myTable\'><thead><tr><th>ID</th><th>Nombre del Administrador</th><th>Status</th></tr></thead><tbody>'.$adm.'</tbody></table>';
	echo '<div id="pager" class="pager">
	<form>
		<img src="images/first.png" class="first"/>
		<img src="images/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="images/next.png" class="next"/>
		<img src="images/last.png" class="last"/>
		<select class="pagesize">
			
			<option value="2">2 por página</option>
			<option value="5">5 por página</option>
			<option value="10" selected="selected">10 por página</option>
			
		</select>
	</form>
</div></div>';
echo '<script type="text/javascript">
	
	$(document).ready(function() 
    { 
        $("#myTable")
		.tablesorter({widthFixed: true, widgets: [\'zebra\']})
		.tablesorterPager({container: $("#pager")});
    });
</script>
';
	if(isset($db))$db->close();
?>