<?php
require_once("configEmp.php");

if(isset($_POST['registrar'])){
    $constructora=new Empleado();
    $constructora->setNombre($_POST['nombreEmp']);
    $constructora->setCedula($_POST['cedula']);
    $constructora->insert();
    echo "<script>alert('datos registrados'); document.location='./index.php'</script>"; 
}


?>