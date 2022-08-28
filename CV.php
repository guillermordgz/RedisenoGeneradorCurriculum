<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link rel="stylesheet" href="styles/cv.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Roboto', sans-serif;
        }

        #informacionBasica {
            background-color: #17a2b8;
            height: 100vh;
            text-align: center;
        }

        img {
            margin-top: 20%;
            margin-bottom: 10%;
        }

        h3{
            margin-top: 10%;
        }

        h4 {
            margin-top: 20%;
        }

        fieldset {
            background-color: white;
            border: 2px solid black;
        }

        legend {
            margin-bottom: 5%;
        }

        .seccionLateral {
            padding: 5%;
            padding-left: 10%;
        }

        .row fieldset {
            margin-top: 10%;
        }
    </style>
</head>
</head>
<body>
    <body>
        <div id="container">
            <div class="row">
                <div class="col-4 shadow-lg" id="informacionBasica">
                <img class= "rounded  shadow-lg" src="images/usuario.jpg" alt="Foto de usuario">
                <h2><?php
                        include("php/conexion.php");
                        $archivo = fopen("php/sesion.txt","r");
                        $valor = fread($archivo, filesize("php/sesion.txt"));
                        $sesion = intval($valor);
                        $select = "SELECT NombreCompleto, descripcion, correoElectronico FROM Usuarios WHERE idUsuario = $sesion";
                        $resultado = mysqli_query($conn, $select);
                        $datosPersonales = mysqli_fetch_array($resultado);
                        echo $datosPersonales['NombreCompleto'];
                        ?></h2>
                        <h3><?php echo $datosPersonales['correoElectronico']?></h3>
                        <h4><?php echo $datosPersonales['descripcion']?></h4>
                </div>
                <div class="col-8 seccionLateral">
                    <div class="row">
                        <fieldset class="col-11 shadow-lg">
                        <legend>Experiencia laboral</legend>
                        <ul>
                        <?php
                        $select = "SELECT nombreEmpresa, puesto, fechaInicio, fechaFin, duracion FROM Experiencia WHERE idUsuario = $sesion";
                        $resultado = mysqli_query($conn, $select);
                        while($row = mysqli_fetch_array($resultado)){
                            ?>
                            <li>
                                    <?php echo 'En' ?>
                                    <?php echo $row['nombreEmpresa'] ?>
                                    <?php echo 'como ' ?>
                                    <?php echo $row['puesto'] ?>
                                    <?php echo 'durante ' ?>
                                    <?php echo $row['duracion'];
                                          echo      ' años';?>
                                    <?php echo ', del ' ?>
                                    <?php echo $row['fechaInicio'] ?>
                                    <?php echo 'al ' ?>
                                    <?php echo $row['fechaFin'] ?>
                            </li>
                        <?php }?>
                        </ul>
                    </fieldset>
                    </div>
                    <div class="row">
                        <fieldset class="col-5 shadow-lg">
                        <legend>Formación académica</legend>
                        <ul>
                        <?php
                        $select = "SELECT nombreEscuela, grado FROM Formacion WHERE idUsuario = $sesion";
                        $resultado = mysqli_query($conn, $select);
                        while($row = mysqli_fetch_array($resultado)){
                        ?>
                        <li>
                                <?php echo 'En ' ?>
                                <?php echo $row['nombreEscuela'] ?>
                                <?php echo ', graduado con el grado de ' ?>
                                <?php echo $row['grado'] ?>
                        </li>
                        <?php }?>
                        </ul>
                    </fieldset>
                    <div class="col-1"></div>
                    <fieldset class="col-5 shadow-lg">
                        <legend>Información de contacto</legend>
                        <ul>
                        <?php
                        $select = "SELECT nombreRed, nombreUsuarioRed FROM Contacto WHERE idUsuario = $sesion";
                        $resultado = mysqli_query($conn, $select);
                        while($row = mysqli_fetch_array($resultado)){
                        ?>
                        <li>
                            <?php echo 'En ' ?>
                            <?php echo $row['nombreRed'] ?>
                            <?php echo ', con el nombre: ' ?>
                            <?php echo $row['nombreUsuarioRed'] ?>
                        </li>
                        <?php }?>
                        </ul>
                    </fieldset>
                    </div>
                    
                </div>
            </div>
            <div class="alert alert-info show fixed-bottom" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
                ¿Es usted <?php echo $datosPersonales['NombreCompleto']?>? De click <a href="index.html" class="alert-link" target="_blanck">aquí</a> para modificar su CV.
              </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>