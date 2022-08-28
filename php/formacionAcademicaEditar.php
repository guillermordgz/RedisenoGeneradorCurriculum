<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formación académica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
        #fondo {
            background-color: #f0f0f0;
            color: black;
        }

        #menu {
            background-color: #17a2b8;
        }
    </style>
</head>

<body id="fondo">
    <nav class="navbar navbar-light navbar-expand-sm d-print" id="menu">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#secciones">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="secciones">
                <ul class="nav navbar-nav nav-fill">
                    <li class="nav-item">
                        <a class="nav-link" href="../CV.php">Ver CV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../acercaMi.html">Acerca de mí</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../informacionContacto.php">Información de contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../formacionAcademica.php">Formación académica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../experiencia.php">Experiencia</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="container">
        <div class="row p-3 m-3">
            <div class="col-12 col-md-5 col-lg-4">
                <form action="editarGrado.php?idGrado=<?php echo $_GET['idGrado']?>" method="post">
                    <div class="mb-5">
                        <label for="escuela" class="mt-5 form-label ">Escuela</label>
                        <input type="text" class="form-control" id="escuela"
                            placeholder="Escriba aquí el nombre de la escuela" name="escuela">
                    </div>
                    <div class="mb-5">
                        <label for="grado" class="form-label ">Grado académico</label>
                        <input type="text" class="form-control" id="grado" placeholder="Escriba aquí el grado académico"
                            name="grado">
                    </div>
                    <input type="submit" onclick="modificado()" class="shadow mt-5 btn btn-secondary" value="Guardar cambios" />
                </form>
            </div>
            <div class="col-12 col-md-7 col-lg-8 mt-5">
                <h2 class="">Usted está editando:</h2>
                <table class="table table-bordered table-sm">
                    <thead class="table-striped">
                        <tr>
                            <th>idGrado</th>
                            <th>nombreEscuela</th>
                            <th>grado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include("conexion.php");

                        $idGrado = $_GET['idGrado'];

                        $select = "SELECT idGrado, nombreEscuela, grado FROM Formacion WHERE idGrado = $idGrado";
                        $resultado = mysqli_query($conn, $select);
                        while($row = mysqli_fetch_array($resultado)){
                    ?>
                            <tr>
                                <td>
                                    <?php echo $row['idGrado'] ?>
                                </td>
                                <td>
                                    <?php echo $row['nombreEscuela'] ?>
                                </td>
                                <td>
                                    <?php echo $row['grado'] ?>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/editarFormacion.js"></script>
</body>

</html>
