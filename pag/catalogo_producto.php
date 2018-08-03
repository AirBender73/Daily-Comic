<?

include 'conexion.php';
$ruta=".";
if(isset($_REQUEST['nombre']) && !isset($_REQUEST['id']))
{

 //Datos recibidos
 $id_productos=$_REQUEST['id_productos'];
 $nombre=$_REQUEST['nombre'];
 $categoria=$_REQUEST['categoria'];
 $descripcion=$_REQUEST['descripcion'];
 $precio=$_REQUEST['precio'];
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
 $insertar="insert into productos(nombre, categoria, descripcion, precio, archivo) values ('$nombre', '$categoria', '$descripcion', '$precio', '$archivo')";
   mysqli_query($conexion, $insertar);?>
	"<script> alert('Has subido el producto');</script>";
	<? echo "<script>window.location='catalogo_producto.php'</script>";
}
	else{?>
<script> alert("Hubo un error")</script>
		<? }
}
}


 
//Consulta
$consulta="select * from productos ";
$resultado=mysqli_query ($conexion,$consulta);
$nfilas=mysqli_num_rows($resultado);//Contar cuantas conlumnas tengo

//Eliminar registros
if(isset($_REQUEST['eliminar'])){
 $eliminar=$_REQUEST['eliminar'];
 mysqli_query($conexion, "delete from productos where id_productos='$eliminar'");
 echo '<script>alert("Registro Borrado")</script>';
 echo "<script>window.location='catalogo_producto.php';</script>";
}

//Editar registro
if(isset($_REQUEST['editar'])){
 $editar=$_REQUEST['editar'];
 $registro=mysqli_query($conexion, "select * from productos where id_productos='$editar'");
 $reg=mysqli_fetch_array($registro);
}

//Actualizar
if(isset($_REQUEST['id'])){
 $id_productos=$_REQUEST['id'];
 $nombre=$_REQUEST['nombre'];
 $categoria=$_REQUEST['categoria'];
 $descripcion=$_REQUEST['descripcion'];
 $precio=$_REQUEST['precio'];
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

 mysqli_query($conexion, "update productos set nombre='$nombre', categoria='$categoria', descripcion='$descripcion', precio='$precio', archivo='$archivo' where id_productos='$id_productos'");

 echo "<script>alert('Registro Actualizado');</script>";
 echo "<script>window.location='catalogo_producto.php'</script>";
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
     <form action="catalogo_producto.php" method="post" enctype="multipart/form-data">


      <h2>Ingresa un producto</h2>
      
      <label>Nombre del producto</label>
      <input type="text" name="nombre" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['nombre']."'";}?>>
      
      <select name="categoria" id="division"<?if (isset($_REQUEST['editar'])){ echo "value='".$reg['categoria']."'";}?>>
			<option value="" selected="selected">Seleccione una categoria</option>
			<option value="Ciencia Ficcion">Ciencia Ficcion</option>
			<option value="Belicos">Belicos</option>
			<option value="Aventura">Aventura</option>
			<option value="Historicos">Historicos</option>
			<option value="Super Heroes">Super Heroes</option>
			<option value="Comedia">Comedia</option>
			<option value="Deportes">Deportes</option>
			<option value="Politicos">Politicos</option>
			<option value="Fantasia">Fantasia</option>
			<option value="Romanticos">Romanticos</option>
			<option value="Terror">Terror</option>
		</select>
      
       <textarea name="descripcion" placeholder="Describe el producto"></textarea>    
                     
      <label>Precio del producto</label>
      <input type="text" name="precio" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['precio']."'";}?>>
      
      <input type="file" name="archivo" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['archivo']."'";}?>>

      <?
      if (isset($_REQUEST['editar'])){echo "<input type='hidden' name='id' value='".$reg['id_productos']."'>";}
      ?>
      <input type="submit" <? if(isset($_REQUEST['editar'])) { echo "value='Guardar'";} else {echo "value='Enviar'";}?> id="boton">

     </form>
    </div>
   </article>
   <table width="95%" border="2" align="center">
			<tr>
				<td>Nombre del producto</td>
				<td>Categoria</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Archivo</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?
			while($productos=mysqli_fetch_array($resultado)){
			?>
			<tr>
			    <td><? echo $productos['nombre']?></td>
			    <td><? echo $productos['categoria']?></td>
			    <td><? echo $productos['descripcion']?></td>
			    <td><? echo $productos['precio']?></td>
				<td> <img src="<? echo $productos['archivo']?>" width="200px;"> </a></td>
				<td><a href="catalogo_producto.php?editar=<? echo $productos['id_productos'];?>">Editar</a></td>
				<td><a href="catalogo_producto.php?eliminar=<? echo $productos['id_productos'];?>">Eliminar</a></td>
			</tr>
			<?};?>
			<tr>
				<td colspan="7" align="center">
					Total de registros <?echo $nfilas;?>
				</td>
			</tr>
 </table>
 <br>
 <br>
 <br>
 <p align="right"><a href="menu_admin.php" style="margin:20px;padding:20px; text-decoration:none; color:white; background-color:#be2534; border-radius:20px;">Regresar al menu admin</a></p>
		
  </main>
  <br>
  <br>
  <footer>
   <? include 'footer.php'?>
  </footer>
 </body>

</html>