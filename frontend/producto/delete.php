<?php
require_once("configPro.php");
if($_GET['r']=="eliminar")
{
    $producto=new producto();
    $producto->setId($_GET['id']);
    $dato=$producto->getOne();
    $producto->setImgTemp($dato[0]['imagen']);
    $producto->delete();
    echo "<script>alert('datos actualizados'); document.location='./index.php'</script>";
}
?>


