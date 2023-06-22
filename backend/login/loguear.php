<?php
session_start();
require_once("config.php");

if(isset($_POST['login'])){
    print_r($_POST);
    $log=new Login();
    $log->setUsuario($_POST['usuario']);
    $log->setPassword($_POST['password']);
    $boole=$log->loginAd();
    if($boole)
    {
        header("Location:../control/cotizacion");
    } else {
        echo"<script>alert('usuario o password invalido'); document.location='../index.php'</script>";
    }
}


?>