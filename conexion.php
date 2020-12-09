<?php
$host='127.0.0.1:33065';
$user='root';
$pass='';
$baseDeDatos='bd_invent';

//CREAR INSTANCIA MYSQL
$conn= new mysqli($host,$user,$pass,$baseDeDatos);
//$conn= new mysqli($host, $user, $pass,$baseDeDatos,33065);
if($conn->connect_errno>0){
  die('ERROR EN  CONEXION['.$conn->connect_error.']');
    
}
?>

