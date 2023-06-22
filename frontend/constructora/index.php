<?php
  require_once("configCo.php");
  session_start();
  if($_SESSION)
  {
        
      
  }else{
      echo"<script>document.location='../../login.php'</script>";
  };
  $constructora=new constructora();
  $datoCo=$constructora->getAll();
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
        
    </section>
    <section>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Celular</th>
                    <th scope="col">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datoCo as $key => $value){?>
                    <tr>
                    <th scope="row"><?php echo $value['id_constructora']?></th>
                    <td><?php echo $value['nombre_cons']?></td>
                    <td><?php echo $value['direccion_cons']?></td>
                    <td><?php echo $value['celular_cons']?></td>
                    <td><a name="" id="" class="btn btn-danger" href="delete.php?r=eliminar&id=<?php echo $value['id_constructora']?>" role="button">ELIMINAR</a></td>
                    <td><a name="" id="" class="btn btn-danger" href="editar.php?r=editar&id=<?php echo $value['id_constructora']?>" role="button">ELIMINAR</a></td>
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
        <form action="registrarCons.php" method="post">
            <label for="nombreCons">nombre de la constructora Cliente</label>
            <input type="text" name="nombreCon" class="form-control" id="">
            <br>
            <label for="direccionCons">direccion de la constructora Cliente</label>
            <input type="text" name="direccionCo" class="form-control" id="">
            <br>
            <label for="celularCons" >celular de la constructora cliente</label>
            <input type="number" name="celularCo" class="form-control" id="">
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