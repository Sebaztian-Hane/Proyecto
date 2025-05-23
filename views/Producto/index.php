<?php
require_once '../../model/Producto.php';
$producto = new Producto();
$datos = $producto->obtenerTodos();
?>
<h2>Listado de Productos</h2>
<a href="agregar.php">Nuevo Producto</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Marca</th><th>Categoria</th>
        <th>Precio Compra</th><th>Precio Venta</th><th>Stock</th><th>Acciones</th>
    </tr>
    <?php while ($row = $datos->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID_Producto'] ?></td>
            <td><?= $row['Nombre'] ?></td>
            <td><?= $row['Marca'] ?></td>
            <td><?= $row['CategoriaNombre'] ?></td>
            <td><?= $row['Precio_Compra'] ?></td>
            <td><?= $row['Precio_Venta'] ?></td>
            <td><?= $row['Stock'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['ID_Producto'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['ID_Producto'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    <a href="../menu/menu.php">Regresar</a>
</table>
