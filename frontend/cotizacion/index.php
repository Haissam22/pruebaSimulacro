<?php
    require_once("configCoti.php");
    require_once("../empleado/configEmp.php");
    require_once("../constructora/configCo.php");
    require_once("../producto/configPro.php");

    session_start();
    if($_SESSION)
    {
        
        
    }else{
        echo"<script>document.location='../../login.php'</script>";
    };
    $cotizacion=new cotizacion();
    $datoCoti=$cotizacion->getAll();
   
    $empleado=new Empleado();
    $datoEmp=$empleado->getAll();
    $constructora=new constructora();
    $datoCon=$constructora->getAll();
    $producto=new producto();
    $datoPro=$producto->getAll();
    $dato=[];
    if(isset($_GET['r'])){
      $cotizacion->setId($_GET['id']);
      $dato=$cotizacion->getOneDet();
    }
    $total=0;
    
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
    <section class=".parte-izquierda">
        <div>
            <img src="" alt="" class="imagen">
            <h3>nombre Empleado</h3>
        </div>
        <div>
            
        </div>
        <br>
        <div class="list-group">
          <a href="../producto" class="list-group-item ">Producto</a>
          <a href="../constructora" class="list-group-item ">Constructora</a>
          <a href="../usuario" class="list-group-item ">Usuario</a>
          <a href="../empleado" class="list-group-item ">Empleado</a>
          <a href="../cotizacion/registrarCoti.php" class="list-group-item ">Generar Cotizacion</a>

        </div>
        
    </section>
    <section class="parte-medio">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">constructora</th>
                    <th scope="col">empleado</th>
                    <th scope="col">fecha</th>
                    <th scope="col">ELIMINAR</th>
                    <th scope="col">ACTUALIZAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datoCoti as $key => $value){?>
                    <tr>
                    <th scope="row"><?php  echo $value['id_cotizacion'];?></th>
                    <th ><?php $constructora->setId($value['id_constructora']); $datoCon=$constructora->getOne(); echo $datoCon[0]['nombre_cons'];?></th>
                    <th><?php $empleado->setId($value['id_empleado']); $datoEm=$empleado->getOne(); echo $datoEm[0]['nombre_emp'];?></th>
                    <td><?php echo $value['fecha']?></td>
                    <td><a name="" id="" class="btn btn-danger" href="delete.php?r=eliminar&id=<?php echo $value['id_cotizacion']?>" role="button">ELIMINAR</a></td>
                    <td><a name="" id="" class="btn btn-warning" href="editar.php?r=editar&id=<?php echo $value['id_cotizacion']?>" role="button">ACTUALIZAR</a></td>
                    <td><a name="" id="" class="btn btn-primary" href="index.php?r=detalle&id=<?php echo $value['id_cotizacion']?>" role="button">DETALLE</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
    </section>
    <!-- Button trigger modal -->


<!-- Modal -->

      <section class="parte-derecho">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">fecha</th>
                    <th scope="col">hora</th>
                    <th scope="col">precio/hora</th>
                    <th scope="col">duracion(horas)</th>
                    <th scope="col">horas extra</th>
                    <th scope="col">subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dato as $key => $value){$total=$total+$value['totalPago'];?>
                    <tr>
                    <th scope="row"><?php  echo $value['id_cotizacion'];?></th>
                    <th ><?php $producto->setId($value['id_producto']); $datoPro=$producto->getOne(); echo $datoPro[0]['nombre'];?></th>
                    <th><?php echo $value['fecha'];?></th>
                    <td><?php echo $value['hora']?></td>
                    <td><?php echo $value['precio']?></td>
                    <td><?php echo $value['duracion']?></td>
                    <td><?php echo $value['horaExtra']?></td>
                    <td><?php echo $value['totalPago']?></td>
                    
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Detalle</button></td>
                    </tr>
                    <?php } ?>
                    <tr>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                    <td><?php echo "total: ".$total;?></td>
                    </tr>
                </tbody>
            </table>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>