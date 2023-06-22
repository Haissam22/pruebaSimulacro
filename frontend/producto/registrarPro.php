<?php
require_once("configPro.php");
print_r($_POST);
print_r($_FILES['imagen']);
$imagen="";
if(isset($_POST['registrar'])){
    $Producto=new producto();
    $Producto->setNombre($_POST['nombre']);
    //coloco una tiempo en segundos para que cada registro de una imagen por equivocacion no sea igual 
    $fecha=new DateTime();
    $imagen=$fecha->getTimesTamp()."_".$_FILES['imagen']['name'];
    $Producto->setImagen($imagen);
    $Producto->setPrecio($_POST['precio']);
    $boole=$Producto->insert();
    if($boole){
        $image_temporal=$_FILES['imagen']['tmp_name'];
        move_uploaded_file($image_temporal,"imagenes/".$imagen);
        echo "<script>alert('datos registrados'); document.location='./index.php'</script>"; 
    }
} 
?>