<?php
	require("../../Classes/users.php");
	$id_user = $_POST['id'];
	$mail = $_POST["mail1"];
	$us = new users();
	$us -> update_email($mail, $id_user);
	echo "Cambios realizados satisfactoriamente.<br />";
	echo "<br /><a href='#' id='regresar'>Regresar</a>";
?>
	<script type="text/javascript">
	$("#regresar").click(function () { 
       $.post('functions/detalle.php',{id: <?php echo $id_user?>},function (data){
			$("#principal").html("");
			$("#principal").append(data);
		});
	});
    </script>