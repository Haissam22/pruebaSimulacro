<?php
require_once("configCoti.php");
if($_GET['r']=="eliminar")
{
    echo $_GET['id'];
    $cotizacion=new cotizacion();
    $cotizacion->setId($_GET['id']);
    $cotizacion->deleteDet();
    $cotizacion->delete();
    echo "<script>alert('datos borrados'); document.location='./index.php'</script>";
}
?>
