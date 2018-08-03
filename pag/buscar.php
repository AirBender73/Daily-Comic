<?php

include 'conexion.php';

$busqueda=$_REQUEST['buscar'];

$seleccionar="select * from productos where nombre like '%$busqueda%'";
$selecCate="select * from productos where categoria like '%$busqueda%'";

$consulta=mysqli_query($conexion, $seleccionar);
$consultaCatego=mysqli_query($conexion, $selecCate);

do{
    echo $resultados['nombre'];
}while($resultados=mysqli_fetch_assoc($consulta));

do{
    echo $resultados['nombre'];
}while($resultados=mysqli_fetch_assoc($consulta));

?>