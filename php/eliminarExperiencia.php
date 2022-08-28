<?php

include("conexion.php");

$idExperiencia = $_GET['idExperiencia'];
mysqli_query($conn, "DELETE FROM Experiencia WHERE idExperiencia = $idExperiencia;");
header("location: ../experiencia.php");
?>
