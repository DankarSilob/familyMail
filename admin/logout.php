<?php
session_start();
session_unset();
session_destroy();
// Salida, regresar a inicio
Header("Location: index.php");
?>