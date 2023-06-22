<?php
require_once("configPro.php");
session_start();
if($_SESSION)
{
      
    
}else{
    echo"<script>document.location='../../login.php'</script>";
};
$producto=new producto();
$dato=[];

if($_GET['id']){
    $id=$_GET['id'];
    $producto->setId($id);
    $dato=$producto->getOne();
    $producto->setImgTemp($dato[0]['imagen']);
}
print_r($_FILES);

if(isset($_POST['actualizar'])){

    $producto->setNombre($_POST['nombre']);
    //coloco una tiempo en segundos para que cada registro de una imagen por equivocacion no sea igual 
    $fecha=new DateTime();
    $imagen=$fecha->getTimesTamp()."_".$_FILES['imagen']['name'];
    $producto->setImagen($imagen);
    $producto->setPrecio($_POST['precio']);
    $im=$producto->getImgTmp();
    unlink("imagenes/".$im);
    $boole=$producto->update();

    if($boole){
        $image_temporal=$_FILES['imagen']['tmp_name'];
        move_uploaded_file($image_temporal,"imagenes/".$imagen);
    }
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
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="" class="form-label">nombre</label>
                    <input type="text" name="nombre" id="" class="form-control" value="<?php echo $dato[0]['nombre'];?>">
                    <br>
                    <label for="" class="form-label">imagen</label>
                    <input type="file" name="imagen" id="" class="form-control" value="<?php echo $dato[0]['imagen'];?>">
                    <br>
                    <label for="" class="form-label">precio</label>
                    <input type="text" name="precio" id="" class="form-control" value="<?php echo $dato[0]['precio'];?>">

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