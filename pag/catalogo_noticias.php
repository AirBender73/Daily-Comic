<?

include 'conexion.php';
if(isset($_REQUEST['nombre']) && !isset($_REQUEST['id']))
{

 //Datos recibidos
 $id_noticias=$_REQUEST['id_noticias'];
 $nombre=$_REQUEST['nombre'];
 $fecha=$_REQUEST['fecha'];
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
 $insertar="insert into noticias(nombre, fecha, archivo) values ('$nombre', '$fecha', '$archivo')";
   mysqli_query($conexion, $insertar);?>
	"<script> alert('Se ha subido la noticia');</script>";
	<? echo "<script>window.location='catalogo_noticias.php'</script>";
}
	else{?>
<script> alert("Hubo un error")</script>
		<? }
}
}


 
//Consulta
$consulta="select * from noticias ";
$resultado=mysqli_query ($conexion,$consulta);
$nfilas=mysqli_num_rows($resultado);//Contar cuantas conlumnas tengo

//Eliminar registros
if(isset($_REQUEST['eliminar'])){
 $eliminar=$_REQUEST['eliminar'];
 mysqli_query($conexion, "delete from noticias where id_noticias='$eliminar'");
 echo '<script>alert("Registro Borrado")</script>';
 echo "<script>window.location='catalogo_noticias.php';</script>";
}

//Editar registro
if(isset($_REQUEST['editar'])){
 $editar=$_REQUEST['editar'];
 $registro=mysqli_query($conexion, "select * from noticias where id_noticias='$editar'");
 $reg=mysqli_fetch_array($registro);
}

//Actualizar
if(isset($_REQUEST['id'])){
 $id_noticias=$_REQUEST['id'];
 $nombre=$_REQUEST['nombre'];
 $fecha=$_REQUEST['fecha'];
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

 mysqli_query($conexion, "update noticias set nombre='$nombre', fecha='$fecha', archivo='$archivo' where id_noticias='$id_noticias'");

 echo "<script>alert('Registro Actualizado');</script>";
 echo "<script>window.location='catalogo_noticias.php'</script>";
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
     <form action="catalogo_noticias.php" method="post" enctype="multipart/form-data">


      <h2>Ingresa una noticia</h2>
      
      <label>Nombre de noticia</label>
      <input type="text" name="nombre" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['nombre']."'";}?>>
      
      <label>Fecha de la noticia</label>
      <input type="date" name="fecha" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['fecha']."'";}?>>
      
      <label>Selecciona un Archivo</label>
      <input type="file" name="archivo" accept="image/*" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['archivo']."'";}?>>

      <?
      if (isset($_REQUEST['editar'])){echo "<input type='hidden' name='id' value='".$reg['id_noticias']."'>";}
      ?>
      <input type="submit" <? if(isset($_REQUEST['editar'])) { echo "value='Guardar'";} else {echo "value='Enviar'";}?> id="boton">

     </form>
    </div>
   </article>
   <table width="95%" border="2" align="center">
			<tr>
				<td>Archivo</td>
				<td>Nombre de Noticia</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?
			while($noticias=mysqli_fetch_array($resultado)){
			?>
			<tr>
				<td> <img src="<? echo $noticias['archivo']?>" width="200px;"> </a></td>
				<td><? echo $noticias ['nombre']?></td>
				<td><? echo $noticias['fecha'];?></td>
				<td><a href="catalogo_noticias.php?editar=<? echo $noticias['id_noticias'];?>">Editar</a></td>
				<td><a href="catalogo_noticias.php?eliminar=<? echo $noticias['id_noticias'];?>">Eliminar</a></td>
			</tr>
			<?};?>
			<tr>
				<td colspan="6" align="center">
					Total de registros <?echo $nfilas;?>
				</td>
			</tr>
		</table>
		 <br>
 <br>
 <br>
 <p align="right"><a href="menu_admin.php" style="margin:20px;padding:20px; text-decoration:none; color:white; background-color:#be2534; border-radius:20px;">Regresar al menu admin</a></p>
		
  <br>
  <br>
  </main>
  <footer>
   <? include 'footer.php'?>
  </footer>
 </body>

</html>