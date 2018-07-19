<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de login</title>
    <link rel="stylesheet" href="../estilos/crearcuenta.css">
    <link rel="stylesheet" href="../estilos/main.css">
</head>
<body>
  <header>
     <? include'header.php'?>
  </header>
  <main>
   <h2>Validación de Usuarios</h2>
    <form action="validar_login.php" method="post" enctype="multipart/form-data">
       <input type="text" name="username" placeholder="Nombre de usuario">
       <input type="password" name="password" placeholder="Contraseña">
       <input type="submit" value="Ingresar" id="boton">
       <input type="hidden" name="<?php echo(session_name());?>" value="<?php echo (session_id());?>">
       <p><a href="home.php">Regresar</a></p>
    </form>
   </main>
   <footer>
      <? include'footer.php'?>
   </footer>
</body>
</html>