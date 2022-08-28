<?php

include("conexion.php");

$idGrado = $_GET["idGrado"];
$escuela = $_POST["escuela"];
$grado = $_POST["grado"];

mysqli_query($conn,"UPDATE Formacion SET nombreEscuela = '$escuela', grado = '$grado' WHERE idGrado = $idGrado");
header("location: ../formacionAcademica.php");


?>
