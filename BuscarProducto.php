<?php
include 'conexion.php';
$palabra=$_GET['q'];
$str="";
// LISTAR PRODUCTOS
$sql="select id_producto,nombre_pro,precio_pro,stock_pro,descripcion_pro  from producto_invent where nombre_pro like'%$palabra' or descripcion_pro like'%$palabra'" ;    
$result2=$conn->query($sql);

 while($fila = $result2->fetch_array()){   
              $registros2[]=$fila; }
  if(isset($registros2)){
      
  
              
 $html="<table style='heigth:70%' > <tr>"
         . "<th>Id</th>"
         ."<th>Nombre</th>"
         . "<th>Precio</th>"
         . "<th>Stock</th>"
         . "<th>Descripcion</th>"
         . "<th  >Opciones </th>"
       
         . "</tr>";             
              
 foreach ($registros2 as $item) {
     
     $html.="<tr>"
             . "<th>".$item['id_producto']. "</th>"
             . "<th>".$item['nombre_pro']." </th>"
             . "<th>".$item['precio_pro']." </th>"
             . "<th>".$item['stock_pro']." </th>"
             . "<th >".$item['descripcion_pro']." </th>"
             . " <th HEIGHT='60'> <a href='"."EliminaProductoDeBusqueda.php?id_producto=".$item['id_producto']."'"."><button HEIGHT='60'> Eliminar</button></a></th>"
          
             . "</tr>";

  
  
  
 
  
 }
    
 $html.="</table>";
 
 
 } else{
       echo('No existen los datos');
       $html='';
  }   
echo $palabra ==""? "":$html;
?>