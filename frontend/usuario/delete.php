<?php
require_once("configUsu.php");
if($_GET['r']=="eliminar")
{
    $usuario=new usuario();
    $usuario->setId($_GET['id']);
    $usuario->delete();
    echo "<script>alert('datos borrados'); document.location='./index.php'</script>";
}
?>


