<?
include '../conexion.php';
$ruta = "..";

$id_productos=$_REQUEST['id'];
$consulta="select * from productos where id_productos='$id_productos'";
$resultado=mysqli_query($conexion,$consulta);
$catego=mysqli_fetch_assoc($resultado);

$consultaComentario="select * from comentarioscomics where id_comic='$id_productos'";
$resultadoComentario=mysqli_query($conexion,$consultaComentario);
//$comentarios=mysqli_fetch_assoc($resultadoComentario);

?>

<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $catego['nombre']; ?> Detalles</title>
		<link rel="stylesheet" href="..\..\estilos\ver.css">
	</head>
<body>
	<header>
		<?php
        include '..\header.php';
        ?>
	</header>
	<main class="main">
		<section class="comics">
			<article>
    <article>
     <figure>
     
      <img src="<? echo $ruta."/".$catego['archivo'];?>" width="250px;">
      
      
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
      <ul align="center">
       <!-- <li><a href="Ver/ver_invazor.html"><span class="icon-eye"></span>Ver</a></li> -->
       <li><a href="#"><span class="icon-download"></span>Descargar</a></li>
       <li><a href="#"><span class="icon-star-full"></span>Favoritos</a></li>
       <li><a href="../contadormegusta.php"><span class="icon-grin2"></span>Me gusta</a></li>
      </ul>
     </div>
    </article>
    <div>
        <form action="insertarcomentario.php" method="post">
            <h3>¿Qué opinas del comic?</h3>
            <input type="text" name="nombreU" placeholder="Nombre" value="<?php echo $_SESSION['username']?>" required>
            <textarea name="comentario" id="" cols="30" rows="10" placeholder="Escribe tu comentario..." required></textarea>
            <input name ="id_comic" type="hidden" value="<?php echo $id_productos;?>">
            <input type="submit" value="Comentar">
        </form>
        <?php 
            while($comentarios=mysqli_fetch_assoc($resultadoComentario)){
                echo $comentarios['nombreU'], $comentarios['comentario'], $comentarios['fecha'],"<br>";
            }
        ?>
    </div>
			</article>
			<br>
            <div class="slider2">
                <h3>Te podria interesar</h3>
                <ul>
                    <li><a href="#"><img src="../../img/ComicsNuevos/Batman.jpg"></a></li>
                    <li><a href="#"><img src="../../img/ComicsNuevos/ScottPilgrim_Vol.3.jpg"></a></li>
                    <li><a href="#"><img src="../../img/ComicsNuevos/ComiAdicto_TheAmazingSpider-Man.jpg"></a></li>
                </ul>
            </div>
		</section>
	</main>	
        <?php
        include '..\footer.php';
        ?>
</body>
</html>