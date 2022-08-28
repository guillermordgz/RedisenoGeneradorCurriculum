<?php

include("conexion.php");

$idGrado = $_GET['idGrado'];

mysqli_query($conn, "DELETE FROM Formacion WHERE idGrado = $idGrado ");
header("location: ../formacionAcademica.php");

?>
