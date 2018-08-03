<? include'conexion.php'; 
session_start();
$consulta_categoria = "select * from productos";
$categoria = mysqli_query($conexion,$consulta_categoria);
$not=mysqli_fetch_array($categoria);

?>

<link rel="stylesheet" href="../estilos/header.css">
	<div class="logo">
		</div>
		<nav class="menu">
			<ul>
				<li><a href="<?php echo $ruta;?>/home.php"><span class="icon-home"></span>Home</a></li>
				<li class="submenu1"><a href="#">Categorías<span class="icon-menu3"></span></a>
					<ul>
						<li><a href="home2.php?categoria=Aventura">Aventuras</a></li>
						<li><a href="home2.php?categoria=Belicos">Bélicos</a></li>
						<li><a href="home2.php?categoria=Ciencia Ficcion">Ciencia Ficción</a></li>
						<li><a href="home2.php?categoria=Super Heroes">Super Héroes</a></li>
						<li><a href="home2.php?categoria=Comedia">Comedia</a></li>
						<li><a href="home2.php?categoria=Deportes">Deportes</a></li>
						<li><a href="home2.php?categoria=Historicos">Historicos</a></li>
						<li><a href="home2.php?categoria=Politicos">Políticos</a></li>
						<li><a href="home2.php?categoria=Fantasia">Fantasía</a></li>
						<li><a href="home2.php?categoria=Romanticos">Románticos</a></li>
						<li><a href="home2.php?categoria=Terror">Terror</a></li>
					</ul>
				</li>
				<li><a href="#">Destacados</a></li>
				<li><a href="#">Descargados</a></li>
				<li><a href="#"><span class="icon-star-empty"></span>Favoritos</a></li>
				<li class="submenu2"><a class="icon-search"></a>
					<ul>
						<li>
							<form action="<?php echo $ruta;?>/buscar.php" method="post">
								<input name="buscar" type="search" placeholder="Buscar...">
								<button type="submit"><span class="icon-search"></span></button>
							</form>	
						</li>		
					</ul>
				</li>
				<li class="submenu3"><a class="icon-users"></a>
					<?php if(empty($_SESSION['username'])){?>
					<ul>
						<li><a href="crearcuenta.php" class="icon-user-plus">Crear Cuenta</a></li>
						<li><a href="login.php" class="icon-user">Iniciar Sesión</a></li>
					</ul>
					<?php } else { ?>
					    <ul>
					        <li>
					            <i class="icon-user-plus"></i> <p> <?php echo $_SESSION['username']; ?></p>
					        </li>
					        <li><a href="cerrarSesion.php">cerrar sesión</a></li>
					    </ul>
					<?php } ?>
				</li>
			</ul>
		</nav>