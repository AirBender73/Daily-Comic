<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/menu_admin.css">
    <link rel="stylesheet" href="../estilos/main.css">
</head>
<body>
   <header>
       <? include'header.php';?>
   </header>
   <main>
    <ul class="catalogo">
        <li><a href="catalogo_noticias.php">Noticias</a></li>
        <li><a href="catalogo_producto.php">Productos</a></li>
        <li><a href="comentarios.php">Comentarios</a></li>
        <li><a href="crearcuenta.php">Usuarios</a></li>
        <li><a href="home.php">Salir</a></li>
    </ul>
    </main>
    <footer>
        <? include'footer.php';?>
    </footer>
</body>
</html>