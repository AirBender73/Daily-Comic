<?

//Se realiza la consulta
include 'conex.php';
$matricula=$_GET['matricula'];
$consulta="select * from datos where matricula=$matricula";
$resultado=mysqli_query($conexion,$consulta);
$alumnos=mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Alumno</title>
    <link rel="stylesheet" href="css/estilo.css"
</head>
<body>
    <h2>DATOS DEL ALUMNO</h2>
    <table class="detalle">
        <tr>
            <td>Matricula</td>
            <td><? echo $alumnos['matricula']; ?></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><? echo $alumnos['nombre']; ?></td>
        </tr>
        <tr>
            <td>Direccion</td>
            <td><? echo $alumnos['calle_num']; ?></td>
        </tr>
        <tr>
            <td>Colonia</td>
            <td><? echo $alumnos['colonia']; ?></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td><? echo $alumnos['ciudad']; ?></td>
        </tr>
        <tr>
            <td>Estado</td>
            <td><? echo $alumnos['estado']; ?></td>
        </tr>
        <tr>
            <td>Division</td>
            <td><? echo $alumnos['division']; ?></td>
        </tr>
        <tr>
            <td>Cuatrimestre</td>
            <td><? echo $alumnos['cuatrimestre']; ?></td>
        </tr>
        <tr>
            <td>Grupo</td>
            <td><? echo $alumnos['grupo']; ?></td>
        </tr>
        <tr>
            <td>Archivo</td>
            <td><? echo $alumnos['archivo']; ?></td>
        </tr>
    </table>
</body>
</html>