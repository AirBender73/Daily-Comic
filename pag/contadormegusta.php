<?php

include 'conexion.php';

$like=false;
$id_productos=$_REQUEST['id_comic'];
$id_usuario=$_REQUEST['id_usuario'];

//Verificar si el usuario ya le dio like al comic
$checklike="select * from contadormegusta where id_comic = '$id_productos' and id_usuario = '$id_usuario'";

$consultaLike=mysqli_query($conexion, $checklike);
$nfilas=mysqli_num_rows($consultaLike);

//Si "nfilas" es mayor que 0, esto significa que hay registros en la Base de Datos
if($nfilas>0){
    $changeStatus = "update contadormegusta set status = !status where id_comic = '$id_productos' and id_usuario = '$id_usuario'";
    $consultaStatus = mysqli_query($conexion, $changeStatus);
    $elementLike = mysqli_fetch_assoc($consultaLike);
    $like  = !$elementLike['status'];
//Si no encuentra un registro anterior en la BD, crea uno y agrega el like
}else{
    $crearStatus = "insert into contadormegusta (id_comic, id_usuario, status) values ('$id_productos', '$id_usuario', 1)";
    $consultaStatus = mysqli_query($conexion, $crearStatus);
    $like = true;
}

//Actualizar el like de la tabla Productos
if($like){
    $addLike = "update productos set megusta = megusta + 1 where id_productos = '$id_productos'";
}else{
    $addLike = "update productos set megusta = megusta - 1 where id_productos = '$id_productos'";
}
$consultaComic = mysqli_query($conexion, $addLike);

?>