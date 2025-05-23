<?php
require_once '../../model/Proveedor.php';
$p = new Proveedor();
$datos = $p->obtenerTodos();
?>
<h2>Listado de Proveedores</h2>
<a href="agregar.php">Nuevo Proveedor</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Apellidos</th><th>País</th><th>Contacto</th><th>Email</th><th>Acciones</th>
    </tr>
    <?php while ($row = $datos->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID_Proveedores'] ?></td>
            <td><?= $row['Nombre'] ?></td>
            <td><?= $row['Apellidos'] ?></td>
            <td><?= $row['Pais_Origen'] ?></td>
            <td><?= $row['Contacto'] ?></td>
            <td><?= $row['Email'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['ID_Proveedores'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['ID_Proveedores'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    <a href="../menu/menu.php">Regresar</a>
</table>
