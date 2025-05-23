<?php
require_once '../../model/Cliente.php';
$c = new Cliente();
$datos = $c->obtenerTodos();
?>
<h2>Listado de Clientes</h2>
<a href="agregar.php">Nuevo Cliente</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Teléfono</th><th>Dirección</th><th>Acciones</th>
    </tr>
    <?php while ($row = $datos->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID_Cliente'] ?></td>
            <td><?= $row['Nombre'] ?></td>
            <td><?= $row['Telefono'] ?></td>
            <td><?= $row['Direccion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['ID_Cliente'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['ID_Cliente'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    <a href="../menu/menu.php">Regresar</a>
</table>
