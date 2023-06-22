<?php
    require_once("../empleado/configEmp.php");
    require_once("configUsu.php");
    session_start();
    if($_SESSION)
    {
      $empleado=new Empleado();
      $datoCo=$empleado->getAll();
      $usuario=new usuario();
      $datos=$usuario->getAll();

    }else{
      echo"<script>document.location='../../login/login.php'</script>";
    };
    
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
    <section>
        <div>
            <img src="" alt="" class="imagen">
            <h3>nombre Empleado</h3>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                registrar cliente
            </button>
        </div>
        <br>
        <div class="list-group">
          <a href="../empleado" class="list-group-item ">Empleado</a>
          <a href="../producto" class="list-group-item ">Producto</a>
          <a href="../constructora" class="list-group-item ">Constructora</a>
          <a href="../usuario" class="list-group-item ">Home</a>
          <a href="../cotizacion" class="list-group-item ">Cotizacion</a>
        </div>
        
    </section>
    <section>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">nombre empleado</th>
                    <th scope="col">usuario</th>
                    <th scope="col">ELIMINAR</th>
                    <th scope="col">ACTUALIZAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos as $key => $value){?>
                    <tr>
                    <th scope="row"><?php $empleado->setId($value['id_empleado']); $datoEm=$empleado->getOne(); echo $datoEm[0]['nombre_emp'];?></th>
                    <td><?php echo $value['usuario']?></td>
                    <td><a name="" id="" class="btn btn-danger" href="delete.php?r=eliminar&id=<?php echo $value['id_empleado']?>" role="button">ELIMINAR</a></td>
                    <td><a name="" id="" class="btn btn-warning" href="editar.php?r=editar&id=<?php echo $value['id_empleado']?>" role="button">ACTUALIZAR</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
    </section>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">registrar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="registrarUsu.php" method="post">
          <div class="mb-3">
            <label for="" class="form-label">empleado</label>
            <select class="form-select form-select-lg" name="id_empleado" id="">
            <?php $empleado=new Empleado(); $datoCo=$empleado->getAll(); print_r($datoCo); foreach ($datoCo as $key => $value) {
              ?><option value="<?php echo $value['id_empleado'];?>"><?php echo $value['nombre_emp'];?></option>
           <?php }?>
            </select>
          </div>
            <label for="nombreCons">usuario</label>
            <input type="text" name="usuario" class="form-control" id="">
            <br>
            <label for="direccionCons">password</label>
            <input type="text" name="password" class="form-control" id="">
            <br>
            <br>
            <button type="submit" name="registrar" value="registrar"class="btn btn-success">Button</button>
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