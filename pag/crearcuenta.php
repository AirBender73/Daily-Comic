<?php


include 'conexion.php';

if(isset($_REQUEST['registrar'])){
    echo "<script> alert('si entre we');</script>";
}



/*
if(isset($_REQUEST['correo']) && !isset($_REQUEST['id']))
{

 //Datos recibidos
 $correo=$_REQUEST['correo'];
 $username=$_REQUEST['username'];
 $password=$_REQUEST['password'];
 $archivo=$_REQUEST['archivo'];

$subio=false;
$dir='../img';
$archivo=$dir."/".$_FILES['archivo']['name'];
if (is_uploaded_file($_FILES['archivo']['tmp_name']))
{
	move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo);
	$subio=true;
	if($subio)
	{
 
$insertar="insert into usuarios(correo, username, password, archivo) values ('$correo', '$username', '$password', '$archivo')";
   mysqli_query($conexion, $insertar);?>
	"<script> alert('Te has registrado');</script>";
	<? echo "<script>window.location='crearcuenta.php'</script>";
	}
	else{?>
<script> alert("Hubo un error")</script>
		<? }
	}
}
   
//Consulta
$consulta="select * from usuarios ";
$resultado=mysqli_query ($conexion,$consulta);
$nfilas=mysqli_num_rows($resultado);//Contar cuantas conlumnas tengo

//Eliminar registros
if(isset($_REQUEST['eliminar'])){
 $eliminar=$_REQUEST['eliminar'];
 mysqli_query($conexion, "delete from usuarios where correo='$eliminar'");
 echo '<script>alert("Registro Borrado")</script>';
 echo "<script>window.location='crearcuenta.php';</script>";
}

//Editar registro
if(isset($_REQUEST['editar'])){
 $editar=$_REQUEST['editar'];
 $registro=mysqli_query($conexion, "select * from usuarios where correo='$editar'");
 $reg=mysqli_fetch_array($registro);
}

//Actualizar
if(isset($_REQUEST['id'])){
 $correo=$_REQUEST['id'];
 $username=$_REQUEST['username'];
 $password=$_REQUEST['password'];
 $archivo=$_REQUEST['archivo'];
 
 $subio=false;
$dir='../img';
$archivo=$dir."/".$_FILES['archivo']['name'];
if (is_uploaded_file($_FILES['archivo']['tmp_name']))
{
	move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo);
	$subio=true;
	if($subio)
	{

 mysqli_query($conexion, "update usuarios set username='$username', password='$password', archivo='$archivo' where correo='$correo'");

 echo "<script>alert('Registro Actualizado');</script>";
 echo "<script>window.location='crearcuenta.php'</script>";
	}
}
}

*/
?>

<!DOCTYPE html>
<html lang="es">

 <head>
  <meta charset="UTF-8">
  <title>Daily-comic</title>
  <link rel="stylesheet" href="../estilos/crearcuenta.css">
  
 </head>
<style>

</style>
 <body>
 
  <header>
   <? include 'header.php'?>
  </header>
  <main class="main">
   <article>
    <div class="formulario">
     <form action="crearcuenta.php" enctype="multipart/form-data" id="formulario" method="post">


      <h2>Crear Cuenta</h2>

      <label>Nombre de usuario</label>
      <input type="text" name="username" id="username" class="" required>

      <label>Correo electrónico</label>
      <input type="email" name="correo" id="correo" required>

      <label>Contraseña</label>                                     
      <input type="password" name="password" id="password" required onkeyup="ValidarPassword(this.value,1)"> 

      <label>Vuele a escribir la contraseña</label>
      <input type="password" name="password2" id="password2" required onkeyup="ValidarPassword(this.value,2)">

        <p class="error displayNone" id="mensaje">Las contraseñas no coinciden</p>
        
      <label>Selecciona tu imagen de perfil</label>
      <input type="file" name="archivo" id="archivo" >
        
      
      <input type="submit" value="Registrarse" id="boton" disabled class="disabled" name="registrar">
      

     </form>
    </div>
   </article>
   
   
		
  </main>
  
  <footer>
   <? include 'footer.php'?>
  </footer>
  <script src="js/validar.js"></script>
 </body>

</html>