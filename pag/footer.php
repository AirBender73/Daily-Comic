<?

include 'conexion.php';
if(isset($_REQUEST['nombre'])){
    
    $nombre=$_REQUEST['nombre'];
    $comentario=$_REQUEST['comentario'];
    
    $insertar="insert into comentarios(nombre, comentario) values ('$nombre', '$comentario')";
    mysqli_query($conexion, $insertar);}?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/crearcuenta.css">
</head>
<body>
    <footer>
        <div>
		<section class="comentario">
            <form method="post">
                <h3>Dejanos tu Comentario</h3>
                <label>Nombre</label>
                <input type="text" name="nombre"></input>
                <textarea name="comentario" placeholder="Escribe tu comentario..."></textarea>
                <input type="submit" <? echo "value='Enviar'";?>></input>
             </form>
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