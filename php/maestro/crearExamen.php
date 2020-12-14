<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 1)
    header("location:../../index.php");

include("listaExamenes_.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear examen</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="inicio.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">            
            <li class="nav-item">
                <a class="nav-link" href="listaGrupos.php">Grupos</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="listaExamenes.php">Exámenes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaAplicaciones.php">Aplicaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../general/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <br><br>
    <h1 class="text-center">
        Crear Examen
    </h1>

    <br><br>

    <p class="h4">
        Lista de preguntas
    </p>
    <hr>
    <button type="button" class="btn btn-sm btn-primary btn-round" onclick="agrega_pregunta()">
        <i class="fas fa-plus-circle"></i> Agregar pregunta
    </button>

    <script>
        $(document).ready(function (){
            // cuando termina de cargar la página
        });

        function get_cantidad_preguntas() {
            let cantidad = 1;
            // foreach de divs con clase pregunta
            $(".pregunta").each(function (){
                cantidad++;
            });

            return cantidad;
        }

        // función para agregar preguntas
        function agrega_pregunta() {
            let cantidad = get_cantidad_preguntas();
            $("#preguntas").append(get_html_pregunta(cantidad))
        }

        function get_html_pregunta(cantidad) {
            return '<div class="pregunta">'+
            '<p class="h5">Pregunta '+cantidad+'</p>'+
            // '<button class="btn btn-sm btn-danger" onclick="elimina_pregunta('+cantidad+')"><i class="fas fa-trash"></i></button>'+
            '<div class="row">'+
                '<div class="col">'+
                '<div class="form-group">'+
                '<label for="planteamiento'+cantidad+'">Planteamiento</label>'+
                '<input type="text" id="planteamiento'+cantidad+'" name="planteamiento'+cantidad+'" class="form-control" required>'+
            '</div>'+
            '</div>'+
            '<div class="col">'+
                '<div class="form-group">'+
                '<label for="palabras'+cantidad+'">Palabras clave</label>'+
            '<input type="text" id="palabras'+cantidad+'" name="palabras'+cantidad+'" class="form-control" required>'+
            '<small class="form-text text-muted">Separe las palabras clave por comas ","</small>'+
            '</div></div></div></div>';
        }

        /*function elimina_pregunta(indice) {
            let cantidad = 1;
            // foreach de divs con clase pregunta
            $(".pregunta").each(function (){
                if (cantidad == indice) {
                    console.log(this);
                }
                cantidad++;
            });
        }*/
    </script>

    <br>
    <br>
    <form action="crearExamen_.php" method="post">
        <!-- Sección de preguntas -->
        <div class="form-group">
            <label for="nombreExamen">Nombre examen</label>
            <input type="text" id="nombreExamen" name="nombreExamen" class="form-control" required>
        </div>
        <div id="preguntas">
            <div class="pregunta">
                <p class="h5">Pregunta 1</p>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="planteamiento1">Planteamiento</label>
                            <input type="text" id="planteamiento1" name="planteamiento1" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="palabras1">Palabras clave</label>
                            <input type="text" id="palabras1" name="palabras1" class="form-control" required>
                            <small class="form-text text-muted">Separe las palabras clave por comas ","</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Sección de preguntas -->

        <!-- Botones de acción -->
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">
                Guardar examen
            </button>
            <a href="listaExamenes.php" class="btn btn-danger">
                Cancelar
            </a>
        </div>
    </form>
</div>
</body>
</html>