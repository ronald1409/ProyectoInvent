<?php
//INDICADOR 
include'conexion.php';
 $indicadorCatMar=1;
if (isset($_GET['indicadorCatMar'])) {
    $indicadorCatMar=$_GET['indicadorCatMar'];
}

//MOSTRAR REGISTROS
$sql="select * from marca_invent";
$result=$conn->query($sql);
while($fila=$result->fetch_array()){
    $registros[]=$fila;}

//MODIFICAR DATOS
    $id_marca="";
    $nombre_mar="";
    $descripcion_mar="";
    
    
if (isset($_GET['id_marca'])) {
   $opt='modificar';
   $id_marca=$_GET['id_marca'];
   $sql="select * from marca_invent where id_marca=$id_marca";
   $result=$conn->query($sql);
   $fila=$result->fetch_array();
   $id_marca=$fila['id_marca'];
    $nombre_mar=$fila['nombre_mar'];
    $descripcion_mar=$fila['descripcion_mar'];
   
    //indicardor
     $indicadorCatMar=1;
}else{
    $opt='insertar';
}


?>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Registro de las marcas del producto</title>
      <link rel="StyleSheet" type=text/css href="EstilosRegistroMar.css">
    </head>
    <body>
        <br>
        <h1 class="titulo">Marcas del producto</h1>
        <br>
        <header>
            <div class="registro">
            <form action="MetodosMarcas.php?indicadorCatMar=<?=$indicadorCatMar?>&opt=<?= $opt?>" method="POST">
                <input type="hidden" value="<?= $id_marca?>" name="id_marca">
                Nombre:
                <input type="text" value="<?= $nombre_mar?>" name="NombreMarca" placeholder="Ingrese nombre de la marca del producto" required>
            <br><br>
            <label>Descripcion:</label>
            <textarea name="DescripcionMar" value="" placeholder="Ingrese la descripcion de la Marca" ><?= $descripcion_mar?></textarea>
             <br> <br>
             <?php
        if(isset($_GET['id_marca'])){
            $button='Modificar';
        }else{
            $button='Registrar';
        }
             ?>
             <input  class="input2" type="submit" value="<?= $button?>">
            </form>
            </div>
            <div>
             <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th colspan="2">Opciones</th>
                </tr>
                 <?php
                    if($result->num_rows>0 ){
                        foreach ($registros as $item) {
                            
                        
                        ?>
                <tr>
                   
                    <th><?= $item['id_marca']?></th>
                    <th><?= $item['nombre_mar']?></th>
                    <th><?= $item['descripcion_mar']?></th>
                    <th><a href='MetodosMarcas.php?id_marca=<?=$item['id_marca']?>&opt=eliminar&indicadorCatMar=1'><button>Eliminar</button></a></th>
                    <th><a href='RegistroMarca.php?id_marca=<?=$item['id_marca'] ?>&opt=modificar'><button>Modificar</button></a></th>
                </tr>
                <?php 
                        }}
                    ?>
               
            </table>
                </div>
        </header>    
        
    </body>
</html>
