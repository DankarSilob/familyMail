<?php
	require("../../Classes/mysql.php");
	//!
	function renglon_tabla($num, $nombre, $ap_paterno, $ap_materno, $prox_pago, $status){
		return '<tr><td>'.$num.'</td><td>'.$nombre.' '.$ap_paterno.' '.$ap_materno.'</td><td>'.$prox_pago.'</td><td>'.$status.'</td><td><a href="#" onclick="desplegar_info( $(this).closest(\'tr\').find(\'td:eq(0)\').text() ) ">Detalles</a></td></tr>';
		//$(this).find("td").eq().html()
		//$(this).closest(\'tr\').find(\'td:eq(1)\').text();
		}
	
	$status = $_POST['status'];
	$usu="";
	$q="SELECT id_user, first_name, last_name_p, last_name_m, (SELECT nextCuttDate FROM Payments WHERE id_user = Users.id_user ORDER BY id_payment DESC LIMIT 0,1) as next_payment FROM Users ORDER BY next_payment;";
	$etiqueta="";
	$hoy = date("Y-m-d");
	$fecha_hoy = strtotime($hoy);
	$db = new mysql();
	$db->connect();
	$db->select();
	$result=mysql_query($q) or die (mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
		$vencimiento = strtotime($row['next_payment']);
		$ultimos7 = strtotime ('-7 day', strtotime($row['next_payment']));
		if($row['next_payment']){
			if($fecha_hoy > $vencimiento){
				$etiqueta = 'EXPIRADO';
				}
			else{
				if($fecha_hoy >= $ultimos7)
				{
					$etiqueta = 'POR VENCER';	
				}
				else
				{
					$etiqueta = "PAGADO";
				}
			}
		}
		else{
			$etiqueta = 'PENDIENTE';	
		}
		if($status == "TODOS"){
			$usu.= renglon_tabla($row['id_user'], $row['first_name'], $row['last_name_p'], $row['last_name_m'],$row['next_payment'],$etiqueta);
			}
			else{
				if($status == $etiqueta){
					$usu.= renglon_tabla($row['id_user'], $row['first_name'], $row['last_name_p'], $row['last_name_m'],$row['next_payment'],$etiqueta);
				}
			}
		}

	echo '<div id=\'smart-paginator\'><table id=\'myTable\'><thead><tr><th>ID</th><th>Usuario</th><th>Fecha de corte</th><th>Status</th><th>Más información</th></tr></thead><tbody>'.$usu.'</tbody></table>';
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
	function nuevaTabla()
	{
		$.post(\'functions/usersTable.php\',{status : $("#status_type").val() },function (data){
			//
			$("#container").html(\'\');
			$("#container").append(data);
		});
	}
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