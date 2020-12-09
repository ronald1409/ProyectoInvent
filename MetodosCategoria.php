<?php
require_once 'conexion.php';


//CONDICION PARA OPCIONES DE CATEGORIA 
if(isset($_GET['opt'])){
    $opt=$_GET['opt'];
}


//CONDICION SI ES QUE SE ACCEDE DE PANTALLA REGIS. PRO.  O REGIS CAT.  -> 0 verdad , 1 falso
$indicadorCatMar=$_GET['indicadorCatMar'];

echo 'opt:'.$opt.'-ind:'.$indicadorCatMar;

if($indicadorCatMar==0){                                          //if primario
$NombreCategoria=$_POST['NombreCategoria'];
$DescripcionCat=$_POST['DescripcionCat'];
$sql= "insert into categoria_invent(nombre_cat, descripcion_cat) value('$NombreCategoria','$DescripcionCat');";
$estado=$conn->query($sql);

header('Location:RegistroProductos.php');
}else{

if($opt=='insertar'){                                           //INSERTAR  
    
    $id=$_POST['id_cat'];
$NombreCategoria=$_POST['NombreCategoria'];
$DescripcionCat=$_POST['DescripcionCat'];

  $sql= "insert into categoria_invent(nombre_cat, descripcion_cat) value('$NombreCategoria','$DescripcionCat');";
$estado=$conn->query($sql);  
header('Location:RegistroCategoria.php');
}else{
    if($opt=='eliminar'){                                      //ELIMINAR
        $id_cat=$_GET['id_cat'];
           $sql="delete from  categoria_invent where id_categoria=$id_cat";
   $estado = $conn->query($sql);
   $mensaje="Datos eliminados";
header('Location:RegistroCategoria.php');
        
    }else{
        if($opt=='modificar'){                                //MODIFICAR
    $id=$_POST['id_cat'];
    $NombreCategoria=$_POST['NombreCategoria'];
    $DescripcionCat=$_POST['DescripcionCat'];
              $sql="update categoria_invent set nombre_cat='$NombreCategoria',descripcion_cat='$DescripcionCat'  where id_categoria=$id";
$estado = $conn->query($sql); 
header('Location:RegistroCategoria.php');
        }
    }
}
}                                                                  //if primario

?>
