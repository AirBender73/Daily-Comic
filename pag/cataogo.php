<?
include 'conexion.php';
if(isset($_REQUEST['matricula']) && !isset($_REQUEST['id'])){

//datos recividos
$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$calle_num=$_POST['calle_num'];
$colonia=$_POST['colonia'];
$ciudad=$_POST['ciudad'];
$estado=$_POST['estado'];
$division=$_POST['division'];
$cuatrimestre=$_POST['cuatrimestre'];
$grupo=$_POST['grupo'];
$archivo=$_POST['$archivo'];


//subirarchivo
$subir=false;
$dir='archivos';
	$archivo=$dir."/".$_FILE['archivo']['name'];
	if(is_uploaded_file($_FILE['archivo']['tmp_name'])){
		move_uploaded_file($_FILE['archivo']['tmp_name'],$archivo);
		$subio=true;
		if ($subio){
				$insertar="insert into datos(matricula,nombre,calle_num,colonia,ciudad,estado,division,cuatrimestre,grupo,archivo) values ('$matricula','$nombre','$calle_num','$colonia','$ciudad','$estado','$division','$cuatrimestre','$grupo','$archivo')";
				//se ejecuta la consulta
				$resultado=mysqli_query($conexion,$insertar);?>
				echo "<script>alert('Alumno Registrado');</script>";
				<?echo "<script>window.location='cataogo.php'</script>";
				}else {?>
						<script>alert("Hubo un error")</script>
					<?}
			}
		}

//Consulta
$consulta="select * from datos ";
$resultado=mysqli_query ($conexion,$consulta);
$nfilas=mysqli_num_rows($resultado);//contar cuanta conlumnas tengo

//Eliminar registros
if(isset($_REQUEST['eliminar'])){
	$eliminar=$_REQUEST['eliminar'];
	mysqli_query($conexion,"delete from datos where matricula=$eliminar");
	echo '<script>alert("Registro Borrado")</script>';
	echo "<script>window.location='cataogo.php';</script>";
}

//editar registro
if(isset($_REQUEST['editar'])){
	$editar=$_REQUEST['editar'];
	$registro=mysqli_query($conexion,"select * from datos where matricula='$editar'");
	$reg=mysqli_fetch_array($registro);
}

//actualizar
if(isset($_REQUEST['id'])){
$matricula=$_REQUEST['id'];
$nombre=$_REQUEST['nombre'];
$calle_num=$_REQUEST['calle_num'];
$colonia=$_REQUEST['colonia'];
$ciudad=$_REQUEST['ciudad'];
$estado=$_REQUEST['estado'];
$division=$_REQUEST['division'];
$cuatrimestre=$_REQUEST['cuatrimestre'];
$grupo=$_REQUEST['grupo'];
$archivo=$_REQUEST['archivo'];

mysqli_query($conexion, "update datos set nombre='$nombre', calle_num='$calle_num', colonia='$colonia', ciudad='$ciudad', estado='$estado', division='$division', cuatrimestre='$cuatrimestre', grupo='$grupo', archivo='$archivo' where matricula='$matricula'");

echo "<script>alert('Registro Actualizado');</script>";
echo "<script>window.location='cataogo.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document </title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<form action="cataogo.php" method="post" enctype="multipart/from-data">
		<h2>Catalogo de alumnos</h2>
		<?//mandamos a imprimir en cada campo el registro a editar?>
		<!-- <input type="text" name="matricula"> -->
		<input type="text" name="matricula"
		<?if (isset($_REQUEST['editar'])){ echo "value='".$reg['matricula']."'";}?>
		 placeholder="Matricula" required>
		 <input type="text" name="nombre"
		<?if (isset($_REQUEST['editar'])){ echo "value='".$reg['nombre']."'";}?>
		placeholder="Nombre">
		<input type="text" name="calle_num"
		<?if(isset($_REQUEST['editar'])){ echo "value='".$reg['calle_num']."'";}?>
		placeholder="Direccion">

		<input type="text" name="colonia"
		<?if (isset($_REQUEST['editar'])){ echo "value='".$reg['colonia']."'";}?>
		placeholder="Colonia">

		<input type="text" name="ciudad" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['ciudad']."'";}?>
		placeholder="Ciudad">

		<input type="text" name="estado" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['estado']."'";}?>
		placeholder="Estado">

		<select name="division" id="division"<?if (isset($_REQUEST['editar'])){ echo "value='".$reg['division']."'";}?>>
			<option value="" selected="selected">Seleccione una carrera</option>
			<option value="TIC"> Tecnologias de la informacion y comunicacion</option>
			<option value="Gastronomia">Gastronomia</option>
			<option value="Procesos"> Procesos de produccion</option>
			<option value="Corrosion">Corrosion</option>
		</select>
		<select name="cuatrimestre" id="cuatrimestre" <?if (isset($_REQUEST['editar'])){ echo "value='".$reg['cuatrimestre']."'";}?>>
			<option value="" selected="selected">Seleccione el Cuatrimestre</option>
			<option value="1">1er Cuatrimestre</option>
			<option value="2">2do Cuatrimestre</option>
			<option value="3">3er Cuatrimestre</option>
			<option value="4">4to Cuatrimestre</option>
			<option value="5">5to Cuatrimestre</option>
			<option value="6">6to Cuatrimestre</option>
		</select>
		<input type="text" name="grupo" <?if (isset($_REQUEST['editar'])) {echo "value='".$reg['grupo']."'";}?>
		placeholder="Grupo">

		<input type="file" name="archivo" placeholder="Selecciona tu archivo" id="archivo">

		<?
		if (isset($_REQUEST['editar'])){echo "<input type='hidden' name='id' value='".$reg['matricula']."'>";}
		?>
		<input type="submit" <? if(isset($_REQUEST['editar'])) { echo "value='Guardar'";} else {echo "value='Enviar'";}?> id="boton">

	</form>

		<table width="95%" border="2" align="center">
			<tr>
				<td>Matriula</td>
				<td>Nombre</td>
				<td>Division</td>
				<td>Cuatrimestre</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?
			while($alumnos=mysqli_fetch_array($resultado)){
			?>
			<tr>
				<td><a href="detallealumnos.php?matricula=<? echo $alumnos['matricula']?>"> <? echo $alumnos['matricula']?> </a></td>
				<td><? echo $alumnos ['nombre']?></td>
				<td><? echo $alumnos ['division']?></td>
				<td><? echo $alumnos ['cuatrimestre']?></td>
				<td><a href="cataogo.php?editar=<? echo $alumnos['matricula'];?>">Editar</a></td>
				<td><a href="cataogo.php?eliminar=<? echo $alumnos['matricula'];?>">Eliminar</a></td>
			</tr>
			<?};?>
			<tr>
				<td colspan="6" align="center">
					Total de registros <?echo $nfilas;?>
				</td>
			</tr>
		</table>
</body>
</html>