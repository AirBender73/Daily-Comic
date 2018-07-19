<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Registro de Productos</title>
            <link rel="stylesheet" href="css/estilo.css">
        </head>
        
        <body>
            <form action="regis_produc.php" method="post">
                <h2>REGISTRO DE PRODUCTOS</h2>
                <?
                
                //MANDAMOS A IMPRIMIR EN CADA CAMPO EL REGISTRO A EDITAR
                
                ?>
                <input type="text" name="cod_barra" placeholder="Código de Barra">
                <input type="text" name="nombre" placeholder="Nombre del Producto">
                <input type="text" name="descripcion" placeholder="Descripción del Producto">
                <input type="text" name="cantidad" placeholder="Cantidad del Producto">
                <input type="text" name="precio_compra" placeholder="Precio de Compra">
                <input type="text" name="precio_venta" placeholder="Precio de Venta">
                <input type="text" name="iva" placeholder="I.V.A">
                <input type="file" name="archivo" placeholder="Selecciona tu Archivo">
                <input type="submit" 
                <?if(isset($_REQUEST['editar'])){echo"value='Actualizar'";}else{echo "value='Insertar'";}?>
                id="boton">
            </form>
            <p></p>
            <h2>PRODUCTOS REGISTRADOS</h2>
            <table width="95%" border="1">
                <tr>
                    <td>Código de Barra</td>
                    <td>Nombre del Producto</td>
                    <td>Descripción</td>
                    <td>Cantidad</td>
                    <td>Precio de Compra</td>
                    <td>Precio de Venta</td>
                    <td>I.V.A</td>
                </tr>
                <? while($productos=mysqli_fetch_array($resultado)) {?>
                <tr>
                    <td><a href="detallealumno.php?matricula=<? echo $producto['cod_barra'];?>"><?echo $producto['cod_barra'];?></a></td>
                    <td><?echo $productos['cod_barra'];?></td>
                    <td><?echo $productos['nombre'];?></td>
                    <td><?echo $productos['descripcion'];?></td>
                    <td><a href="catalogo.php?editar=<? echo $productos['cod_barra'];?>">Editar</a></td>
                    <td><a href="catalogo.php?eliminar=<? echo $productos['cod_barra'];?>">Eliminar</a></td>
                </tr>
                <? };?>
                <tr>
                    <td colspan="6">Total de Registros: <? echo $nfilas;?></td>
                </tr>
            </table>
        </body>
    </html>