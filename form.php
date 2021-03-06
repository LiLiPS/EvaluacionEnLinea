<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genérico</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Proyecto IA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Opción 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Opción 2</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Opción 3</a>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <br><br>
    <h1 class="text-center">
        Título del formulario
    </h1>

    <br><br>
    <form action="#">
        <div class="form-group">
            <label for="input1">Etiqueta 1</label>
            <input type="text" id="input1" name="input1" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input2">Etiqueta 2</label>
            <input type="text" id="input2" name="input2" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="input3">Etiqueta 3</label>
            <input type="text" id="input1" name="input3" class="form-control" required>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="input1">Etiqueta 1</label>
                    <input type="text" id="input1" name="input1" class="form-control" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="input2">Etiqueta 2</label>
                    <input type="text" id="input2" name="input2" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="input1">Etiqueta 1</label>
                    <input type="text" id="input1" name="input1" class="form-control" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="input2">Etiqueta 2</label>
                    <input type="text" id="input2" name="input2" class="form-control" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="input2">Etiqueta 2</label>
                    <input type="text" id="input2" name="input2" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">
                Guardar
            </button>
            <a href="formato.php" class="btn btn-danger">
                Cancelar
            </a>
        </div>
    </form>
</div>
</body>
</html>