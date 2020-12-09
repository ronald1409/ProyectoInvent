<?php
include 'conexion.php';
$id=$_GET['id_producto'];

$sql="delete from  producto_invent where id_producto=$id";
$estado=$conn->query($sql);

?>

