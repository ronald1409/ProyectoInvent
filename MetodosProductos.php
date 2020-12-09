<?php
include 'conexion.php';


$opt=$_GET['opt'];
$id=$_GET['id_producto'];
$mensaje="";

//echo $opt;
if($opt=='elimina'){
   $sql="delete from  producto_invent where id_producto=$id";
   $estado = $conn->query($sql);
   $mensaje="Datos eliminados";
header('Location:RegistroProductos.php');
}else{

    ///CATEGORIAS
  
$NombreCategoria=$_POST['NombreCategoria1'];
//require_once("RegistroProductos.php");
//$persona= new Persona();
//$persona->hablar();


//MARCA
$nombre_mar=$_POST['NombreMarca'];

//PRODUCTO
$nombrePro=$_POST['NombreProducto'];
$precio_pro=$_POST['PrecioProducto'];

$sql="select id_categoria from categoria_invent where nombre_cat='$NombreCategoria'";
$result= $conn->query($sql);
$fila = $result->fetch_array();
$id_cat=$fila['id_categoria'];

$sql="select id_marca from marca_invent where nombre_mar='$nombre_mar'";
$result= $conn->query($sql);
$fila = $result->fetch_array();
$id_m=$fila['id_marca'];

$stock_pro=$_POST['Stock'];
$DescripcionPro=$_POST['DescripcionPro'];

if($id==0){
$sql="insert into producto_invent(nombre_pro,precio_pro,idcat_pro,idmarca_pro,stock_pro,descripcion_pro)value('$nombrePro',$precio_pro,$id_cat,$id_m,$stock_pro,'$DescripcionPro');";
$estado=$conn->query($sql);
//$registros[]=$fila;
//if ($result->num_rows>0) {
//    echo $result->num_rows;
//}else{
//    echo "Nohay consulta";
//}
header('Location:RegistroProductos.php');
}else{
    if($opt='modifica'){
        $sql="update producto_invent set nombre_pro='$nombrePro',precio_pro=$precio_pro,idcat_pro=$id_cat,idmarca_pro=$id_m,stock_pro=$stock_pro,descripcion_pro='$DescripcionPro'  where id_producto=$id";
$estado = $conn->query($sql); 
header('Location:RegistroProductos.php');
//echo 'se realizo la consulta';
    }
}    
}//else1

?>
 
<script type="text/javascript">
    
    //window.location.href='RegistroProductos.php';
</script>


