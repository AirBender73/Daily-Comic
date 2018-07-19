<?

include 'conexion.php'

?>

<!DOCTYPE html>
<html lang="es">
 <head>
  <meta charset="UTF-8">
  <title>Daily-Comic</title>
  <link rel="stylesheet" href="..\estilos\home.css">
 </head>
 <body>
  <header>
   <? include 'header.php'?>
  </header>
  <main class="main">
   <aside class="noticias">
   <?
 
   $consulta_noticias = "SELECT * FROM noticias order by fecha desc limit 3";
   $noticias = mysqli_query($conexion,$consulta_noticias);
   $not=mysqli_fetch_array($noticias);
   
   ?>
    <div class="slider">
        <ul>
            <? do{ ?> <li><img src="<? echo $not['archivo'];?>"></li> <?} while($not=mysqli_fetch_assoc($noticias))?>
        </ul>
    </div>
   </aside>
   
   <section class="comics">
   <?
     $consulta_categoria = "select * from productos order by id_productos desc limit 5";
     $categoria = mysqli_query($conexion,$consulta_categoria);
     $not=mysqli_fetch_array($categoria); 
     ?>
     
     <? do{ ?>
    <article>
     <figure>
     
      <img src="<? echo $not['archivo'];?>" width="250px;">
      
      
     </figure>
     
     <div class="texto">
     <h3>
      <? echo $not['nombre'];?>
      </h3>
      <p>
       <? echo $not['descripcion'];?>
      </p>
     </div>
     <div class="opciones">
      <ul>
       <li><a href="#"><span class="icon-eye"></span>Ver</a></
       <li><a href="#"><span class="icon-download"></spanargar</a></li>
       <li><a href="#"><span class="icon-star-full"></span>Favoritos</a></li>
       <li><a href="#"><span class="icon-grin2"></span>Me gusta</a></li>
       <li><a href="#"><span class="icon-frustrated2"></span>Nusta</a></li>
      </ul>
     </div>
    </article>
    <? }while($not=mysqli_fetch_assoc($categoria))?>
    
    
   </section>
   
  </main>	
  <footer>
   <? include 'footer.php'?>
  </footer>
 </body>
</html>