<?php
require 'conexion.php';
$nombre_mar=$_POST['NombreMarca'];
$descripcionMarca=$_POST['DescripcionMar'];
$sql= "insert into marca_invent(nombre_mar, descripcion_mar) value('$nombre_mar','$descripcionMarca');";
$estado=$conn->query($sql);

header('Location:RegistroProductos.php');
?>

