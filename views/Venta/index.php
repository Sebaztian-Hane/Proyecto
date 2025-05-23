<?php
require_once '../../model/conexion.php';
require_once '../../model/Venta.php';

$conn = conectar();
$productos = $conn->query("SELECT ID_Producto, Nombre FROM PRODUCTOS");
$tiposPago = $conn->query("SELECT ID_MetodoPago, Metodo FROM METODOS_PAGOS");

$ventaModel = new Venta();
$ventas = $ventaModel->obtenerVentasConDetalles();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venta</title>
</head>
<body>
    <h2>Registrar Venta</h2>

    <form action="../../controller/VentasController.php?accion=registrar" method="POST">
        <label>Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <label>Método de Pago:</label>
        <select name="metodo_pago" required>
            <?php while ($row = $tiposPago->fetch_assoc()): ?>
                <option value="<?= $row['ID_MetodoPago'] ?>"><?= $row['Metodo'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label>Producto:</label>
        <select name="producto_id[]" multiple required>
            <?php while ($row = $productos->fetch_assoc()): ?>
                <option value="<?= $row['ID_Producto'] ?>"><?= $row['Nombre'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label>Cantidades (en el mismo orden):</label><br>
        <input type="text" name="cantidades" placeholder="Ej: 2,1,3" required><br><br>

        <button type="submit">Registrar Venta</button>
    </form>
    <h2>Ventas Registradas</h2>
    <table border="1">
        <tr>
            <th>ID Venta</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Método de Pago</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($row = $ventas->fetch_assoc()): ?>
            <tr>
                <td><?= $row['ID_Ventas'] ?></td>
                <td><?= $row['Fecha'] ?></td>
                <td><?= $row['Total'] ?></td>
                <td><?= $row['Metodo'] ?></td>
                <td><?= $row['Nombre'] ?></td>
                <td><?= $row['Cantidad'] ?></td>
                <td><?= $row['Subtotal'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="../menu/menu.php">Regresar</a>
</body>
</html>
