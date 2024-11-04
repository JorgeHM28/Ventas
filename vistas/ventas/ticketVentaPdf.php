<?php 
require_once "../../clases/Conexion.php";
require_once "../../clases/Ventas.php";

$objv = new Ventas();
$c = new conectar();
$conexion = $c->conexion();	
$idventa = $_GET['idventa'];

$sql = "SELECT ve.id_venta,
               ve.fechaCompra,
               ve.id_cliente,
               art.nombre,
               art.precio,
               art.descripcion
        FROM ventas AS ve 
        INNER JOIN articulos AS art ON ve.id_producto = art.id_producto
        WHERE ve.id_venta = '$idventa'";

$result = mysqli_query($conexion, $sql);
$ver = mysqli_fetch_row($result);

$folio = $ver[0];
$fecha = $ver[1];
$idcliente = $ver[2];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Venta</title>
    <style type="text/css">
        @page {
            margin: 0.5em;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: small;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 1.5em;
            margin: 0;
        }
        .header p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total {
            font-weight: bold;
            font-size: larger;
            text-align: right;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>INVENTORY</h1>
        <p>Fecha: <?php echo $fecha; ?></p>
        <p>Folio: <?php echo $folio; ?></p>
        <p>Cliente: <?php echo $objv->nombreCliente($idcliente); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT ve.id_venta,
                           ve.fechaCompra,
                           ve.id_cliente,
                           art.nombre,
                           art.precio,
                           art.descripcion
                    FROM ventas AS ve 
                    INNER JOIN articulos AS art ON ve.id_producto = art.id_producto
                    WHERE ve.id_venta = '$idventa'";

            $result = mysqli_query($conexion, $sql);
            $total = 0;

            while ($mostrar = mysqli_fetch_row($result)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($mostrar[3]); ?></td>
                <td><?php echo "$" . number_format($mostrar[4], 2); ?></td>
            </tr>
            <?php
                $total += $mostrar[4];
            } 
            ?>
            <tr>
                <td class="total">Total:</td>
                <td class="total"><?php echo "$" . number_format($total, 2); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
 