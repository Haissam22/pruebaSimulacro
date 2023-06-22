<?php
require_once("configEmp.php");
session_start();
if($_SESSION)
{
      
    
}else{
    echo"<script>document.location='../../login.php'</script>";
};
$empleado=new Empleado();
$dato=[];
if($_GET['id']){
    $id=$_GET['id'];
    $empleado->setId($id);
    $dato=$empleado->getOne();
}

if(isset($_POST['actualizar'])){
    $empleado->setNombre($_POST['nombre']);
    $empleado->setCedula($_POST['cedula']);
    $empleado->update();
    echo "<script>alert('datos actualizados'); document.location='./index.php'</script>";
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <label for="" class="form-label">nombre</label>
                    <input type="text" name="nombre" id="" class="form-control" value="<?php echo $dato[0]['nombre_emp'];?>">
                    <br>
                    <label for="" class="form-label">nombre</label>
                    <input type="text" name="cedula" id="" class="form-control" value="<?php echo $dato[0]['cedula'];?>">
                    <br>
                    <button type="submit" class="btn btn-success" name="actualizar">Actualizar</button>
                </form>
            </div>
            <div>
                <a name="" id="" class="btn btn-primary" href="./index.php" role="button">regresar</a>
            </div>
        </div>
    </div>
    
    
        <div class="mb-3">
            
            
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>