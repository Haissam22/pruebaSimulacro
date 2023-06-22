<?php
require_once("configCo.php");

if(isset($_POST['registrar'])){
    echo($_POST);
    $constructora=new constructora();
    $constructora->setNombre($_POST['nombreCon']);
    $constructora->setCelular($_POST['celularCo']);
    $constructora->setdireccion($_POST['direccionCo']);
    $constructora->insert();
    echo "<script>alert('datos actualizados'); document.location='./index.php'</script>";
}
?>