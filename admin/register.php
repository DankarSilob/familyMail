<?php

		//Este es un archivo que contiene la información de conexión a la base de datos.
		//La conexión se hace desde este archivo existente.
        include ("../Classes/mysql.php");


//Validación de entrada y código de BD.
        if ( $_GET["op"] == "reg" )
  {
  $bInputFlag = false;
  foreach ( $_POST as $field )
        {
        if ($field == "")
    {
    $bInputFlag = false;
    }
        else
    {
    $bInputFlag = true;
    }
        }
//Si tuvimos problemas con la entrada, salida con error.
  if ($bInputFlag == false)
        {
        die( "Problemas con su información de registro. Por favor regrese e intente de nuevo.");
        }

  // Campos están libres. Agregue usuario a la BD
  // Establecer consulta
  $db = new mysql();
		$db->connect();
		$db->select();
  $q = "INSERT INTO `dbUsers` (`username`,`password`,`email`) "
        ."VALUES ('".$_POST["username"]."', "
        ."PASSWORD('".$_POST["password"]."'), "
        ."'".$_POST["email"]."')";
  //  Ejecutar consulta
  $db->query($q);
  
  // Asegurarnos de que la consulta insertó satisfactoriamente al usuario / revisar si ya existe nombre de usuario.
  if ( !mysql_insert_id() )
        {
        die("Error: Usuario no agregado a la base de datos.");
        }
  else
        {
        // Redirigir a la página de agradecimiento.
        Header("Location: register.php?op=thanks");
        }
  } // fin del if


//La página de agradecimiento
        elseif ( $_GET["op"] == "thanks" )
  {
  echo "<h2>Gracias por registrarse!</h2>";
  }
  
//Forma web para habilitar ingreso de información.
        else
  {
  echo "<form action=\"?op=reg\" method=\"POST\">\n";
  echo "Usuario: <input name=\"username\" MAXLENGTH=\"16\"><br />\n";
  echo "Password: <input type=\"password\" name=\"password\" MAXLENGTH=\"16\"><br />\n";
  echo "Email: <input name=\"email\" MAXLENGTH=\"25\"><br />\n";
  echo "<input type=\"submit\">\n";
  echo "</form>\n";
  }
        // EOF
        ?>