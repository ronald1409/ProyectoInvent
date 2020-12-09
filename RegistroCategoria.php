<?php
include 'conexion.php';
$button='Registrar';


//CONDICION SI ES QUE SE ACCEDE DE PANTALLA REGIS. PRO.  O REGIS CAT.  -> 0 verdad , 1 falso
$indicadorCatMar=1;
 if (isset($_GET['indicadorCatMar'])) {
$indicadorCatMar=$_GET['indicadorCatMar'];   
}

//DATOS PARA MOSTRAR EN TABLA
$sql="select * from categoria_invent";
$result=$conn->query($sql);
 while($fila = $result->fetch_array()){   
              $registros[]=$fila; }

//DATOS PARA MODIFICAR
              $id_cat=0;
              $nombre_cat="";
              $descripcion_cat="";
              
              if (isset($_GET['id_cat'])) {
     $id_cat=$_GET['id_cat'];        
     $opt=$_GET['opt'];
     $sql="select id_categoria,nombre_cat,descripcion_cat from categoria_invent where id_categoria=$id_cat";

     $result=$conn->query($sql);
 $fila = $result->fetch_array();   
            
  $id_cat=$fila['id_categoria'];
    $nombre_cat=$fila['nombre_cat'];
    $descripcion_cat=$fila['descripcion_cat'];
    
    //INDICARDOR
    $indicadorCatMar=1;
    
 }else{
     $opt='insertar';
 }
   
              ?>


<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Registro de categorias</title>
      <link rel="StyleSheet" type=text/css href="EstilosRegistroCat.css">
    </head>
    <body>
        <header>
           
            <br>
            <h1 class="titulo">Categorias  del  Producto</h1>  
            <br>
            <br>
        </header>
        <section>
            <div class="prin"> 
                <div class="registro">
            <form action="MetodosCategoria.php?indicadorCatMar=<?=$indicadorCatMar?>&opt=<?=$opt ?>" method="POST">
                <input type='hidden' value='<?= $id_cat?>' name='id_cat' >
                Nombre:
                <input class="input1"   type="text" name="NombreCategoria" value="<?= $nombre_cat?>" placeholder="Ingrese nombre de la categoria" required>
                <br><br>
                   <label>Descripcion:</label>
                   <textarea name="DescripcionCat"  placeholder="Ingrese  descripcion de la categoria" ><?= $descripcion_cat?></textarea>
                  <br> <br>
                  <?php
                  if(isset($_GET['id_cat'])){
                      $button='Modificar';
                  }  else {
                      $button='Registrar';
                      $opt='insertar';
                  }
                      ?>
                  <input class="input2" type="submit" value="<?= $button?>" >
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
                   
                    <th><?= $item['id_categoria']?></th>
                    <th><?= $item['nombre_cat']?></th>
                    <th><?= $item['descripcion_cat']?></th>
                    <th><a href='MetodosCategoria.php?id_cat=<?=$item['id_categoria']?>&opt=eliminar&indicadorCatMar=1'><button>Eliminar</button></a></th>
                    <th><a href='RegistroCategoria.php?id_cat=<?=$item['id_categoria'] ?>&opt=modificar'><button>Modificar</button></a></th>
                </tr>
                <?php 
                        }}
                    ?>
               
            </table>
                    </div></div>
        </section>
        <footer>
        </footer>    
    </body>
</html>

