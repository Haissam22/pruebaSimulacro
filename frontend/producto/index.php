<?php
    require_once("configPro.php");
    session_start();
    if($_SESSION)
    {
          
        
    }else{
        echo"<script>document.location='../../login.php'</script>";
    };
    $producto=new producto();
    $datoCo=$producto->getAll();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <section class="sec-derec">
        <div>
            <img src="" alt="" class="imagen">
            <h3>nombre producto</h3>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                registrar producto
            </button>
        </div>
        <br>
        <div class="list-group">
          <a href="../empleado" class="list-group-item ">Empleado</a>
          <a href="../constructora" class="list-group-item ">Constructora</a>
          <a href="../usuario" class="list-group-item ">Usuario</a>
          <a href="../cotizacion" class="list-group-item ">Disabled item</a>
        </div>
    </section>
    <section class="tabla">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">imagen</th>
                    <th scope="col">precio</th>
                    <th scope="col">ELIMINAR</th>
                    <th scope="col">ACTUALIZAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($datoCo) {foreach($datoCo as $key => $value){?>
                    <tr>
                    <th scope="row"><?php echo $value['id_producto']?></th>
                    <td><?php echo $value['nombre']?></td>
                    <td><img src="./imagenes/<?php echo $value['imagen']?>" alt=""></td>
                    <td><?php echo $value['precio']?></td>
                    <td><a name="" id="" class="btn btn-danger" href="delete.php?r=eliminar&id=<?php echo $value['id_producto']?>" role="button">ELIMINAR</a></td>
                    <td><a name="" id="" class="btn btn-warning" href="editar.php?r=editar&id=<?php echo $value['id_producto']?>" role="button">ACTUALIZAR</a></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
    </section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">registrar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./registrarPro.php" method="post" enctype="multipart/form-data">
            <label for="nombreCons">NOMBRE producto </label>
            <input type="text" name="nombre" class="form-control" id="">
            <br>
            <label for="direccionCons">precio producto</label>
            <input type="text" name="precio" class="form-control" id="">
            <br>
            <label for="direccionCons">Imagen </label>
            <input type="file" name="imagen" id="">
            <br>
            <button type="submit" name="registrar" value="registrar"class="btn btn-success">Registrar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>