<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Registro </title>

    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    
</head>

    <body>
        <div class="container">
                <br><br>
                <h1 class="text-center">
                    Ingresa tus datos
                </h1>

            <br><br>
            <form action="php/general/registrar.php" method="POST" id="registro" onsubmit="exito()">
                <div class="form-group">
                    <label for="correo"> Correo: </label>
                    <input type="text" id="correo" name="correo" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="psw"> Contraseña: </label>
                    <input type="password" id="psw" name="psw" class="form-control"  required >
                </div>
            
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success" >
                        Registrarse
                    </button>
                    <a href="index.php" class="btn btn-danger">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    

        <script>

            function exito(){

                var correo = document.querySelector('#correo').value,
                 psw = document.querySelector('#psw').value;

                 if( correo === '' || psw === ''){
                      // SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Ambos campos son obligatorios!',
                        })
                 }else{
                      // SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto!',
                            text: 'Registro exitoso!',
                        })
                     
                 }

                
            }

        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>



    
</html>