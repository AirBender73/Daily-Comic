 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/footer.css">
</head>
<body>
    
</body>
<footer>
        <div>
		<section class="comentario">
            <form method="post" action="<?php echo $ruta;?>/home.php">
                <h3>Dejanos tu Comentario</h3>
                <input type="text" name="nombre" placeholder="Nombre"></input>
                <textarea name="comentario" placeholder="Escribe tu comentario..."></textarea>
                <input name="Enviar" type="submit" <? echo "value='Enviar'";?>></input>
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
</html>    