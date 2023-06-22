<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Typografia -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="login.css">

</head>
<body>
    <div class="container-m">
        <div class="section1">
            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 style="font-weight: 800;">BIENVENIDOS</h1>
                </div>
                <div  class="d-flex justify-content-center align-items-center" >
                    <form action="loguear.php" method="post">
                        Usuario: <input class="form-control" type="text" name="usuario" id="">
                        <br>
                        Constraseña: <input class="form-control" type="password" name="password">
                        <br>
                        <button class="btn btn-success" name="login" value="login" type="submit">Entrar al portafolio</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  <!-- Boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>