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


    if(isset($_SESSION['array_cotizacion']) && is_array($_SESSION['array_cotizacion'])){
        $array=$_SESSION['array_cotizacion'];
    }else{
        $array=[];
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $precio=0;
        foreach ($datoPro as $key => $value) {
            if($_POST['producto']==$value['id_producto']){
                $precio=$value['precio'];
            }
        }
        $factura=[
            'id_constructora'=>$_POST['constructora'],
            'id_empleado'=>$_POST['empleado'],
            'fecha'=>$_POST['fecha'],
            'id_producto'=>$_POST['producto'],
            'hora'=>$_POST['hora'],
            'precio'=>$precio,
            'duracion'=>$_POST['duracion']
        ];
        $array[]=$factura;

        $_SESSION['array_cotizacion']=$array;

    }
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
    <section class="parte-izquierda">
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
          <a href="../producto" class="list-group-item ">Producto</a>
          <a href="../constructora" class="list-group-item ">Constructora</a>
          <a href="../usuario" class="list-group-item ">Usuario</a>
          <a href="../cotizacion" class="list-group-item ">home</a>
        </div>
        
    </section>
    <section class="parte-media">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">constructora</th>
                    <th scope="col">empleado</th>
                    <th scope="col">producto</th>
                    <th scope="col">fecha</th>
                    <th scope="col">hora</th>
                    <th scope="col">precio/hora</th>
                    <th scope="col">precio/hora</th>
                    <th scope="col">ELIMINAR</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($array as $key => $value){?>
                    <tr>
                    <th scope="row"><?php $constructora->setId($value['id_constructora']); $datoCon=$constructora->getOne(); echo $datoCon[0]['nombre_cons'];?></th>
                    <th><?php $empleado->setId($value['id_empleado']); $datoEm=$empleado->getOne(); echo $datoEm[0]['nombre_emp'];?></th>
                    <th><?php $producto->setId($value['id_producto']); $datopro=$producto->getOne(); echo $datopro[0]['nombre'];?></th>
                    <td><?php echo $value['fecha']?></td>
                    <td><?php echo $value['hora']?></td>
                    <td><?php echo $value['precio']?></td>
                    <td><?php echo $value['duracion']?></td>
                    <td><?php echo $value['duracion']*$value['precio'];?></td>
                
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td><a name="" id="" class="btn btn-success" href="./generarCotizacion.php" role="button">generar factura</a></td></tr>
                </tbody>
            </table>
    </section>
    <div class="parte-derecho " id="detalles">
            <h1>AGREGAR PRODUCTO</h1>
      <form class="col d-flex flex-wrap"  action="" method="post">
          <div class="mb-1 col-12">
              <label for="nombre" class="form-label">empleado</label>
                <select class="form-control" name="empleado" id="" >
                  <option value="">empleado</option>
                  <?php 
                  foreach($datoEmp as $key => $value){
                    ?>
                  <option value="<?php echo $value['id_empleado']; ?> "> <?php echo $value['nombre_emp']; ?> </option>
                  <?php }?>
                </select>
          </div>
          <div class="mb-1 col-12">
              <label for="nombre" class="form-label">cliente constructora</label>
                <select class="form-control" name="constructora" id="" >
                  <option value="">cliente</option>
                  <?php 
                  $constructora=new constructora();
                  $datoCon=$constructora->getAll();
                  foreach($datoCon as $key => $value){
                    ?>
                  <option value="<?php echo $value['id_constructora']; ?> "> <?php echo $value['nombre_cons']; ?> </option>
                  <?php }?>
                </select>
          </div>
          <div class="mb-1 col-12">
              <label for="nombre" class="form-label">producto</label>
                <select class="form-control" name="producto" id="" >
                  <option value="">producto</option>
                  <?php 
                  $producto=new producto();
                  $datoPro=$producto->getAll();
                  foreach($datoPro as $key => $value){
                    ?>
                  <option value="<?php echo $value['id_producto']; ?> "> <?php echo $value['nombre'];?> PRECIO POR HORA:<?php echo $value['precio'];?> </option>
                  <?php }?>
                </select>
          </div>
          <div class="mb-1 col-12">
            <label for="fecha" class="form-label">fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha">
          </div>
          <div class="mb-1 col-12">
            <label for="hora" class="form-label">hora</label>
            <input type="time" name="hora"  class="form-control" id="">
          </div>
          <div class="mb-1 col-12">
            <label for="fecha" class="form-label">duracion en horas</label>
            <input type="number" class="form-control" name="duracion" id="">
          </div>
          
          
          <div class=" col-12 m-2">
            <input type="submit" class="btn btn-primary" name="generar" value="agregar a factura" name=""/>
          </div>
      </form> 
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
