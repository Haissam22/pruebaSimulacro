<?php
require_once("configUsu.php");
print_r($_POST);

$imagen="";
if(isset($_POST['registrar'])){
    $usuario=new usuario();
    $usuario->setId($_POST['id_empleado']);
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setPassword($_POST['password']);
    $usuario->insert();
   echo "<script>alert('datos registrados'); document.location='./index.php'</script>";
    
} 
?>