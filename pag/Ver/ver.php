<?
include '../conexion.php';

$categoria=$_GET['categoria'];
$consulta="select * from productos where categoria='$categoria' order by id_productos desc limit 5";
$resultado=mysqli_query($conexion,$consulta);
$catego=mysqli_fetch_assoc($resultado);


?>

<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>comiadicto</title>
		<link rel="stylesheet" href="..\..\estilos\ver.css">
	</head>
<body>
	<header>
		<div class="logo">
		</div>
		<nav class="menu">
			<ul>
				<li><a href="../home.html"><span class="icon-home"></span>Home</a></li>
				<li class="submenu1"><a href="#">Categorías<span class="icon-menu3"></span></a>
					<ul>
						<li><a href="../categorias/aventuras.html">Aventuras</a></li>
						<li><a href="../categorias/belicos.html">Bélicos</a></li>
						<li><a href="cienciafic.html">Ciencia Ficción</a></li>
						<li><a href="superheroe.html">Super Héroes</a></li>
						<li><a href="comedia.html">Comedia</a></li>
						<li><a href="deportes.html">Deportes</a></li>
						<li><a href="historicos.html">Historicos</a></li>
						<li><a href="politicos.html">Políticos</a></li>
						<li><a href="fantasia.html">Fantasía</a></li>
						<li><a href="romanticos.html">Románticos</a></li>
						<li><a href="terror.html">Terror</a></li>
					</ul>
				</li>
				<li><a href="..\destacados.html">Destacados</a></li>
				<li><a href="..\descargados">Descargados</a></li>
				<li><a href="..\fav.html"><span class="icon-star-empty"></span>Favoritos</a></li>
				<li class="submenu2"><a class="icon-search"></a>
					<ul>
						<li>
							<a class="icon-radio-checked">
								<input type="search" placeholder="Buscar">
							</a>	
						</li>		
					</ul>
				</li>
				<li class="submenu3"><a class="icon-users"></a>
					<ul>
						<li><a href="../crearcuenta.php" class="icon-user-plus">Crear Cuenta</a></li>
						<li><a href="../login.php" class="icon-user">Iniciar Sesión</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<main class="main">
		<section class="comics">
			<article>
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
	<footer>
        <div>
		<section class="comentario">
            <div>
            <h3>Dejanos tu comentario</h3>
            <ul>
                <li><a href="#"><span class="icon-radio-checked"></span>Enviar</a></li>
            </ul>
            </div>
            <textarea></textarea>
        </section>
        <section class="sociales">
            <h3>Siguenos en nuestras redes sociales</h3>
            <ul>
                <li><a href="https://www.facebook.com/"><span class="icon-facebook2"></span></a></li>
                <li><a href="https://twitter.com/?lang=es"><span class="icon-twitter"></span></a></li>
                <li><a href="https://www.youtube.com/"><span class="icon-youtube2"></span></a></li>
            </ul>
        </section>
        </div>
	</footer>
</body>
</html>