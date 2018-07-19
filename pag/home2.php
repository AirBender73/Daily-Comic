<?

include'conexion.php';

$categoria=$_GET['categoria'];
$consulta="select * from productos where categoria='$categoria' order by id_productos desc limit 5";
$resultado=mysqli_query($conexion,$consulta);
$catego=mysqli_fetch_assoc($resultado);




?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Categoria <? echo $catego['categoria']?></title>
		<link rel="stylesheet" href="..\estilos\home.css">
	</head>
<body>
	<header>
		<? include'header.php';?>
 </header>
	<main class="main">
		<aside class="noticias">
		
		<?
        $consulta_noticias = "SELECT * FROM noticias order by fecha desc limit 3";
        $noticias = mysqli_query($conexion,$consulta_noticias);
        $not=mysqli_fetch_array($noticias);
        ?>
    <div class="slider">
        <? do{ ?>
			<img src="<? echo $not['archivo'];?>">
         <?} while($not=mysqli_fetch_assoc($noticias))?> 
    </div>
		</aside>
		<section class="comics">
		
			<? do{ ?>
    <article>
     <figure>
     
      <img src="<? echo $catego['archivo'];?>" width="250px;">
      
      
     </figure>
     
     <div class="texto">
     <h3>
      <? echo $catego['nombre'];?>
      </h3>
      <p>
       <? echo $catego['descripcion'];?>
      </p>
     </div>
     <div class="opciones">
      <ul>
       <li><a href="Ver/ver_invazor.html"><span class="icon-eye"></span>Ver</a></li>
       <li><a href="#"><span class="icon-download"></span>Descargar</a></li>
       <li><a href="#"><span class="icon-star-full"></span>Favoritos</a></li>
       <li><a href="#"><span class="icon-grin2"></span>Me gusta</a></li>
       <li><a href="#"><span class="icon-frustrated2"></span>No me gusta</a></li>
      </ul>
     </div>
    </article>
    <? }while($catego=mysqli_fetch_assoc($resultado))?>
			
		</section>
	</main>	
	<footer>
        <? include'footer.php';?>
	</footer>
</body>
</html>