<?php
require_once("configCo.php");
if($_GET['r']=="eliminar")
{
    $constructora=new constructora();
    $constructora->setId($_GET['id']);
    $constructora->delete();
    echo "<script>alert('datos actualizados'); document.location='./index.php'</script>";
}


?>