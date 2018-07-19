<?

//incluimos el archivo que contiene la cadena de conexion

include 'conex.php';

//Recibir las variables

$icula=$_POST['matricula'];
$re=$_POST['nombre'];
$e_num=$_POST['calle_num'];
$nia=$_POST['colonia'];
$ad=$_POST['ciudad'];
$dos=$_POST['estados'];
$sion=$_POST['division'];
$rimestre=$_POST['cuatrimestre'];
$o=$_POST['grupo'];
$ivo=$_POST['archivo'];

//Insertamos el registro

$insertar="insert into datos(matricula,nombre,calle_num,colonia,ciudad,estados,division,cuatrimestre,grupo,archivo) values ('$matricula','$nombre','$calle_num','$colonia','$ciudad','$estados','$division','$cuatrimestre','$grupo','$archivo')";

//Se ejecuta la consulta

$resultado=mysqli_query($conexion,$insertar);

if(!$resultado)
{
    echo "Error al registrarse";
}

else
{
    echo "Alumno registrado";
}

//Cerramos la conexion

mysqli_close($conexion);

?>