<?

include 'conexion.php';
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


?>

<!DOCTYPE html>
<html lang="es">

 <head>
  <meta charset="UTF-8">
  <title>Daily-comic</title>
  <link rel="stylesheet" href="../estilos/crearcuenta.css">
 </head>

 <body>
  <header>
   <? include 'header.php'?>
  </header>
  <main class="main">
   <article>
    <div class="formulario">
     <form action="crearcuenta.php" method="post" enctype="multipart/form-data">


      <h2>Crear Cuenta</h2>

      <label>Nombre de usuario</label>
      <input type="text" name="username" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['username']."'";}?>>

      <label>Correo electrónico</label>
      <input type="text" name="correo" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['correo']."'";}?>>

      <label>Contraseña</label>                                     
      <input type="password" name="password" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['password']."'";}?>>

      <label>Vuele a escribir la contraseña</label>
      <input type="password" name="password">

      <label>Selecciona tu imagen de perfil</label>
      <input type="file" name="archivo" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['archivo']."'";}?>>

      <?
      if (isset($_REQUEST['editar'])){echo "<input type='hidden' name='id' value='".$reg['correo']."'>";}
      ?>
      <input type="submit" <? if(isset($_REQUEST['editar'])) { echo "value='Guardar'";} else {echo "value='Enviar'";}?> id="boton">

     </form>
    </div>
   </article>
   <table width="95%" border="2" align="center">
			<tr>
				<td>Nombre</td>
				<td>Correo</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?
			while($usuarios=mysqli_fetch_array($resultado)){
			?>
			<tr>
				<td><? echo $usuarios['username']?></td>
				<td><? echo $usuarios ['correo']?></td>
				<td><a href="crearcuenta.php?editar=<? echo $usuarios['correo'];?>">Editar</a></td>
				<td><a href="crearcuenta.php?eliminar=<? echo $usuarios['correo'];?>">Eliminar</a></td>
			</tr>
			<?};?>
			<tr>
				<td colspan="6" align="center">
					Total de registros <?echo $nfilas;?>
				</td>
			</tr>
		</table>
		
  </main>
  
  <footer>
   <? include 'footer.php'?>
  </footer>
 </body>

</html>