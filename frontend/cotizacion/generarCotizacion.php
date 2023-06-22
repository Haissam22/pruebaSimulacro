<?php
session_start();
if($_SESSION)
{
      
    
}else{
    echo"<script>document.location='../../login.php'</script>";
};
require_once("configCoti.php");

$cotizacion=new cotizacion();

if($_SESSION['array_cotizacion']){
    $array=$_SESSION['array_cotizacion'];
    print_r($array);

    $cotizacion->setId_constructora($array[0]['id_constructora']);
    $cotizacion->setId_empleado($array[0]['id_empleado']);
    $cotizacion->setFecha($array[0]['fecha']);
    $cotizacion->insertCotizacion();
    $datoC=$cotizacion->getAll();
    $id=end($datoC);
    
    foreach ($array as $key => $value) {
        
        $cotizacion->setId($id['id_cotizacion']);
        $cotizacion->setId_producto($value['id_producto']);
        $cotizacion->setFecha($value['fecha']);
        $cotizacion->setHora($value['hora']);
        $cotizacion->setPrecio($value['precio']);
        $cotizacion->setDuracion($value['duracion']);
        $nP=$value['precio'];
        $nH=$value['duracion'];
        $total=$nP*$nH;
        $cotizacion->settotalPago($total);  
        $cotizacion->insertDetalleCo();

    }
    $_SESSION['array_cotizacion']=[];
    echo "<script> alert('datos registrados'); document.location='./index.php'</script>";

    

}


?>