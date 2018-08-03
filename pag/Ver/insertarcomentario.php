<?php
include '../conexion.php';

$nombreU=$_REQUEST['nombreU'];
$comentario=$_REQUEST['comentario'];
$id_comic=$_REQUEST['id_comic'];

$insertar="insert into comentarioscomics (nombreU, comentario, id_comic) values ('$nombreU', '$comentario', '$id_comic')";

$insertado=mysqli_query($conexion, $insertar);

header("location:ver.php?id=$id_comic");

?>