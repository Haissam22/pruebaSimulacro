<?php
require_once("configEmp.php");
if($_GET['r']=="eliminar")
{
    $empleado=new Empleado();
    $empleado->setId($_GET['id']);
    $empleado->delete();
    echo "<script>alert('datos actualizados'); document.location='./index.php'</script>";
}
?>


