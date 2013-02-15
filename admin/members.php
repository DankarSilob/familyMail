<?php
session_start();

if (!$_SESSION["valid_user"])
        {
        // Usuario que no ha ingresado, redirige a página de ingreso.
        Header("Location: index.php");
        }

// Contenido solo para miembro
/**/

// Mostrar información de miembro
echo "<p>ID de Usuario: " . $_SESSION["valid_id"];
echo "<p>Nombre de Usuario: " . $_SESSION["valid_user"];
echo "<p>Fecha de Ingreso: " . date("m/d/Y", $_SESSION["valid_time"]);

// Mostrar liga de salida
echo "<p><a href=\"logout.php\">Haga clic aquí para salir...</a></p>";
?>