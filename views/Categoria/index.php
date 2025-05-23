<?php
require_once '../../model/Categoria.php';
$categoria = new Categoria();
$resultado = $categoria->obtenerTodas();
?>
<h2>Listado de Categorías</h2>
<a href="agregar.php">Nueva Categoría</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID_Categorias'] ?></td>
            <td><?= $row['Tipo'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['ID_Categorias'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['ID_Categorias'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    <a href="../menu/menu.php">Regresar</a>
</table>
