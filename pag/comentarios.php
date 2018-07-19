<?

include 'conexion.php';


//Consulta
$consulta="select * from comentarios";
$resultado=mysqli_query ($conexion,$consulta);
$nfilas=mysqli_num_rows($resultado);

//Eliminar registros
if(isset($_REQUEST['eliminar'])){
    $eliminar=$_REQUEST['eliminar'];
    mysqli_query($conexion, "delete from comentarios where id_comentarios='$eliminar'");
    echo '<script>alert("Registro Borrado")</script>';
    echo "<script>window.location='comentarios.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="es">

 <head>
  <meta charset="UTF-8">
  <title>Daily-comic</title>
  <link rel="stylesheet" href="../estilos/crearcuenta.css">
 </head>

 <body>
  <header>
      <? include'header.php';?>
  </header>
  <main>
  <table width="95%" border="2" align="center">
          <tr>
              <td>Nombre</td>
              <td>Comentario</td>
              <td>Eliminar</td>
          </tr>
          <? while($comentarios=mysqli_fetch_array($resultado)){ ?>
          <tr>
              <td><? echo $comentarios ['nombre']?></td>
              <td><? echo $comentarios ['comentario']?></td>
              <td><a href="comentarios.php?eliminar=<? echo $comentarios['id_comentarios'];?>">Eliminar</a></td>
          </tr>
          <?};?>
          <tr>
              <td colspan="6" align="center">
                  Total de Comentarios <?echo $nfilas;?>
              </td>
          </tr>
      </table>
       <br>
 <br>
 <br>
 <p align="right"><a href="menu_admin.php" style="margin:20px;padding:20px; text-decoration:none; color:white; background-color:#be2534; border-radius:20px;">Regresar al menu admin</a></p>
		
  <br>
  <br>
  </main>
  <footer>
      <? include'footer.php';?>
  </footer>
 </body>

</html>