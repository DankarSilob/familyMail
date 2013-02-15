<?php
        session_start();
        // Archivo de la base de datos y configuración
        include "../Classes/mysql.php";
		
        if ($_GET["op"] == "login")
  {
  if (!$_POST["username"] || !$_POST["password"])
        {
       die("Necesita proporcionar nombre de usuario y contraseña");
        }
  
  // Crea consulta
  $q = "SELECT `id`,`username`,`password` FROM `dbUsers` "
        ."WHERE `username`='".$_POST["username"]."' "
        ."AND `password`=PASSWORD('".$_POST["password"]."') "
        ."LIMIT 1";
  $db = new mysql();
		$db->connect();
		$db->select();
  // Ejecuta consulta
  $r = mysql_query($q) or die (mysql_error());
  if ( $obj = mysql_fetch_assoc($r))
        {
        // Buen inicio de sesión, crea variables
        $_SESSION["valid_id"] = $obj->id;
        $_SESSION["valid_user"] = $_POST["username"];
        $_SESSION["valid_time"] = time();

        // Redirige a página de miembro
        //Header("Location: members.php");
		Header("Location: listUsers.php");
        }
  else
        {
        //Ingreso no exitoso
		if(isset($db))$db->close();
        die("Lo sentimos, no pudimos ingresarlo. Información incorrecta.");
        }
	    if(isset($db))$db->close();
  }
        else
  {
//If all went right the Web form appears and users can log in
  echo "<form action=\"?op=login\" method=\"POST\">";
  echo "Usuario: <input name=\"username\" size=\"15\"><br />";
  echo "Contraseña: <input type=\"password\" name=\"password\" size=\"8\"><br />";
  echo "<input type=\"submit\" value=\"Login\">";
  echo "</form>";
  }
?>
