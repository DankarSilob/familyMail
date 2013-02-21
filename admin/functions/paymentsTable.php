<?php
include "../../Classes/mysql.php";
session_start();
if (!$_SESSION["valid_user"])
    {
    // Usuario que no ha ingresado, redirige a página de ingreso.
    Header("Location: index.php");
    }
	// Contenido solo para administrador
	$pym="";
	$q="SELECT id_payment, (SELECT first_name FROM Users WHERE id_user = Payments.id_user LIMIT 0,1) as name, (SELECT last_name_p FROM Users WHERE id_user = Payments.id_user LIMIT 0,1) as last_name_p, (SELECT last_name_m FROM Users WHERE id_user = Payments.id_user LIMIT 0,1) as last_name_m, payment_date, amount, nextCuttDate FROM Payments;";
	$db = new mysql();
	$db->connect();
	$db->select();
	$result=mysql_query($q) or die (mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
		$pym.='<tr><td>'.$row['id_payment'].'</td><td>'.$row['name'].' '.$row['last_name_p'].' '.$row['last_name_m'].'</td><td>'.$row['payment_date'].'</td><td>'.$row['amount'].'</td><td>'.$row['nextCuttDate'].'</td></tr>';
		}
	if(isset($db))$db->close();
	//echo "<h2>Administradores</h2>";
	echo '<div id=\'smart-paginator\'><table id=\'myTable\'><thead><tr><th>ID Pago</th><th>Usuario</th><th>Fecha del pago</th><th>Cantidad</th><th>Próxima fecha de corte</th></tr></thead><tbody>'.$pym.'</tbody></table>';
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