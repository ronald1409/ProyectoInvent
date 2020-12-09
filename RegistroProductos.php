<?php
//include'InsertarRegistroProducto.php';
include 'conexion.php';
$indicadorCatMar=0;

//LISTAR NOMBRE DE CATEGORIAS
$sql="select nombre_cat  from categoria_invent ";   
$result=$conn->query($sql);
 while($fila = $result->fetch_array()){   
              $registros[]=$fila; }

 //LISTAR NOMBRE DE MARCAS
$sql="select nombre_mar  from marca_invent ";   
$result1=$conn->query($sql);
 while($fila = $result1->fetch_array()){   
              $registros1[]=$fila; }

// LISTAR PRODUCTOS
$sql="select id_producto,nombre_pro,precio_pro,stock_pro,descripcion_pro  from producto_invent ";   
$result2=$conn->query($sql);
 while($fila = $result2->fetch_array()){   
              $registros2[]=$fila; }
  
 //VALOR INICIAL             
 $opt="insertar";
 $id_producto=0;
 $nombre_pro="";
 $precio_pro="";
 $stock_pro="";
 $descripcion_pro="";
 
 //MODIFICAR DATOS
 if( isset($_GET['id'])){
     $id_producto=$_GET['id'];
    
     $opt=$_GET['opt'];
     $sql="select id_producto,nombre_pro,precio_pro,stock_pro,descripcion_pro from producto_invent where id_producto=$id_producto";

     $result=$conn->query($sql);
 $fila = $result->fetch_array();   
            
  $id_producto=$fila['id_producto'];
    $nombre_pro=$fila['nombre_pro'];
    $precio_pro=$fila['precio_pro'];
    $stock_pro=$fila['stock_pro'];
    $descripcion_pro=$fila['descripcion_pro'];  

 }
     
 //LISTAR PRODUCTOS BUSCADOS
 if (isset($_GET['RegistrosBus'])) {
    print 'existe valor';
}
 
          
 //OBJETOS
             // $llamar=new Metodos();
             
//class Persona{
  
 //   public $nombre="pedro";
    
 //   public function hablar(){
 //   echo "hola choco";
   // }


//$Persona= new Persona();
//$persona->hablar("hablar");
?>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Registro Productos</title>
    <link rel="StyleSheet" type=text/css href="EstilosRegistroPr.css">
        <script type='text/javascript'>
    function mostrar(str){
                
                if (str.length==0) {
       document.getElementById("txt").innerHTML="";
                     
        }
                
                let xhttp =new XMLHttpRequest();
              xhttp.onreadystatechange= function(){
                 if(this.readyState == 4 && this.status==200){
                      
        document.getElementById("txt").innerHTML=xhttp.responseText;
                  }
              }      
                xhttp.open("GET","BuscarProducto.php?q="+str,true);
                //enviar
                xhttp.send();
            }

   
 </script>
   </head>
 
    <body>
    
        <header>
            <h1 class="titulo" >REGISTRO DE PRODUCTOS</h1>
        </header>
   
        <div class="print">
            <div>
        <section>
            <form action="MetodosProductos.php?opt=<?= $opt?>&id_producto=<?=$id_producto?>" method="POST">
                 <div>
                    <fieldset><legend>Categoria</legend>
                        <label> Seleccione: &nbsp;</label>
                    <select class="SeleccionarCat" name="NombreCategoria1" value="Seleccione" > 
                      <?php
                       if ($result->num_rows>0) {
                          
                           foreach ($registros as $item) {
                               
                           
                       
                      ?>
                        <option ><?= $item['nombre_cat']?></option>
                       
                      <?php
                           }
                       }else{
                           ?>
                        <option ></option>
                        <?php
                       }
                        ?>
                    </select>&nbsp; &nbsp;<a href="RegistroCategoria.php?indicadorCatMar=0">  Nuevo registro de categoria</a>
                
                     <br>
                  
                   </fieldset>
                    </div>
                   <div>
                       <br>
                    <fieldset><legend>Marca</legend>
                        <label> Seleccione:</label>
                       
                        <select class="SeleccionarMar" name="NombreMarca" value="" required >
                      <?php
                      if($result1->num_rows>0 ){
                          foreach ($registros1 as $item) {
                              
                          
                      ?>  
                            
                            <option onclick="llamar()"  ><?= $item ['nombre_mar']?></option>
                    <?php
                      }
                      }else{
                    ?>        
                            
                        <option ></option>
                     <?php
                      }
                      ?>
                    </select>&nbsp; &nbsp;<a href="RegistroMarca.php?indicadorCatMar=0">  Nuevo registro de marca</a>
                    
                    </fieldset>
                       
                    
                       </div>
             <div>
                 <br>
                <fieldset> <legend>Producto</legend>
         
            <input type='hidden' name='id_producto' value='<?= $id_producto ?>'>
            <label> Nombre:</label>
            <input type="text" name="NombreProducto" value="<?= $nombre_pro?>" placeholder="Ingrese nombre del producto" required>
            <br><br>
            <label>Precio:</label>
            <input type="text" name="PrecioProducto" value="<?= $precio_pro?>" placeholder="Ingrese precio del producto" required>
            <br><br>
            <label>Stock:</label>
            <input type="text" name="Stock" value="<?= $stock_pro?>" placeholder="stock producto" required>
            <br><br>
            <label>Descripcion:</label>
            <br>
            <textarea name="DescripcionPro"  placeholder="Ingrese la descripcion del  producto" ><?= $descripcion_pro?></textarea>
            
            
            </fieldset>
                   <br> 
                  <?php 
                  if($id_producto==0){
                      $button='Registrar';
                  }else{
                      $button='Modificar';
                  }
                  ?>
                  <input class="formEnviar" type="submit" value="<?= $button?>" name="Registrar" >   
            </div>
           
               
            </form>    
        </section>
            </div>
               <div> 
           
        <aside>
            
            <div id="clase1">
                
            
              
                           <label>Buscar</label>
                           <form>
                           <input   type="text"  placeholder="Buscar" onkeyup="mostrar(this.value)">
                                       <p> <span id="txt"></span></p>
                           </form>
                           </div>
            <table>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                    <th colspan="2">Opciones</th>
                </tr>
                <?php
                if($result2->num_rows>0){
                foreach ($registros2 as $item) {
                ?>
                <tr>
                    <th><?= $item['id_producto']?></th>
                    <th><?= $item['nombre_pro']?></th>
                    <th><?= $item['precio_pro']?></th>
                    <th><?= $item['stock_pro']?></th>
                    <th><?= $item['descripcion_pro']?></th>
                    <th> <a href="MetodosProductos.php?opt=elimina&id_producto=<?=$item['id_producto']?>"><button > Eliminar</button></a></th>
                    <th> <a href="RegistroProductos.php?opt=modifica&id=<?=$item['id_producto']?>"><button>Modificar</button> </a></th>
                </tr>
                <?php
                }
                }
                ?>
            </table>
      
        </aside>
            </div>
                 </div>
        <footer>
        </footer>
    </body>
</html>
<?php
//}
?>
