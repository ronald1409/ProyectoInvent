<?php

require_once 'conexion.php';


//CONDICION PARA OPCIONES DE CATEGORIA 
if(isset($_GET['opt'])){
    $opt=$_GET['opt'];
}


//CONDICION SI ES QUE SE ACCEDE DE PANTALLA REGIS. PRO.  O REGIS CAT.  -> 0 verdad , 1 falso
$indicadorCatMar=$_GET['indicadorCatMar'];

//echo 'opt:'.$opt.'-ind:'.$indicadorCatMar;

if($indicadorCatMar==0){                                          //if primario
$nombre_mar=$_POST['NombreMarca'];
$descripcionMarca=$_POST['DescripcionMar'];
$sql= "insert into marca_invent(nombre_mar, descripcion_mar) value('$nombre_mar','$descripcionMarca');";
$estado=$conn->query($sql);

header('Location:RegistroProductos.php');
}else{

if($opt=='insertar'){                                           //INSERTAR  
    
   $nombre_mar=$_POST['NombreMarca'];
$descripcionMarca=$_POST['DescripcionMar'];
$sql= "insert into marca_invent(nombre_mar, descripcion_mar) value('$nombre_mar','$descripcionMarca');";
$estado=$conn->query($sql);  
header('Location:RegistroMarca.php');
}else{
    if($opt=='eliminar'){                                      //ELIMINAR
        $id_marca=$_GET['id_marca'];
           $sql="delete from  marca_invent where id_marca=$id_marca";
   $estado = $conn->query($sql);
   $mensaje="Datos eliminados";
header('Location:RegistroMarca.php');
        
    }else{
        if($opt=='modificar'){                                //MODIFICAR
    $id=$_POST['id_marca'];
   $nombre_mar=$_POST['NombreMarca'];
$descripcionMarca=$_POST['DescripcionMar'];
              $sql="update marca_invent set nombre_mar='$nombre_mar',descripcion_mar='$descripcionMarca'  where id_marca=$id";
$estado = $conn->query($sql); 
header('Location:RegistroMarca.php');
        }
    }
}
}        
?>
