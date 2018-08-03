<?

include 'conexion.php';
$ruta = ".";
if(isset($_REQUEST['nombre'])){
    
    $nombre=$_REQUEST['nombre'];
    $comentario=$_REQUEST['comentario'];
    
    $insertar="insert into comentarios(nombre, comentario) values ('$nombre', '$comentario')";
    mysqli_query($conexion, $insertar);
}

?>

<!DOCTYPE html>
<html lang="es">
 <head>
  <meta charset="UTF-8">
  <title>Daily-Comic</title>
  <link rel="stylesheet" href="..\estilos\home.css">
 </head>
 <body >
  <header>
   <? include 'header.php';?>
  </header>
  <main class="main">
   <aside class="noticias">
   <?
 
   $consulta_noticias = "SELECT * FROM noticias order by fecha desc limit 3";
   $noticias = mysqli_query($conexion,$consulta_noticias);
   $noticia=mysqli_fetch_array($noticias);
   
   ?>
    <div class="slider">
        <ul>
            <? do{ ?> <li><img src="<? echo $noticia['archivo'];?>"></li>
            <?} while($noticia=mysqli_fetch_assoc($noticias))?>
        </ul>
    </div>
   </aside>
   
   <section class="comics">
   <?
     $consulta_categoria = "select * from productos order by id_productos desc limit 5";
     $categoria = mysqli_query($conexion,$consulta_categoria);
     $comic=mysqli_fetch_array($categoria); 
     ?>
     
     <? do{ ?>
    <article>
     <figure>
     
      <img src="<? echo $comic['archivo'];?>" width="250px;">
      
      
     </figure>
     
     <div class="texto">
     <h3>
      <? echo $comic['nombre'];?>
      </h3>
      <p>
       <? echo $comic['descripcion'];?>
      </p>
     </div>
     <div class="opciones">
      <ul>
          <li><a href="Ver/ver.php?id=<?php echo $comic['id_productos'];?>"><span class="icon-eye"></span>Ver</a></li>
          <li><a href="#"><span class="icon-download"></span>Descargar</a></li>
       <li><a href="#"><span class="icon-star-full"></span>Favoritos</a></li>
       <li><a href="contadormegusta.php?id_comic=<?php echo $comic['id_productos']?>&id_usuario=<?php echo $_SESSION['id_usuario']?>"><span class="icon-grin2"></span>Me gusta</a></li>
      </ul>
     </div>
    </article>
    <? }while($comic=mysqli_fetch_assoc($categoria))?>
    
    
   </section>
   
  </main>	
  <footer>
   <? include 'footer.php';?>
  </footer>
 </body>
</html>