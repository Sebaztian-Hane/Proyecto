<?php
require_once '../../model/Encargado.php';
$e = new Encargado();
$datos = $e->obtenerTodos();
?>
<h2>Encargados</h2>
<a href="agregar.php">Nuevo Encargado</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nombres</th><th>Apellidos</th><th>Cargo</th><th>Teléfono</th><th>Salario</th><th>Acciones</th>
    </tr>
    <?php while ($row = $datos->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID_Encargados'] ?></td>
            <td><?= $row['Nombres'] ?></td>
            <td><?= $row['Apellidos'] ?></td>
            <td><?= $row['Cargo'] ?></td>
            <td><?= $row['Telefono'] ?></td>
            <td><?= $row['Salario'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['ID_Encargados'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['ID_Encargados'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    <a href="../menu/menu.php">Regresar</a>
</table>
