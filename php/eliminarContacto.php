<?php

include("conexion.php");

$idRedSocial = $_GET['idRedSocial'];

mysqli_query($conn, "DELETE FROM Contacto WHERE idRedSocial = $idRedSocial ");
header("location: ../informacionContacto.php");

?>
