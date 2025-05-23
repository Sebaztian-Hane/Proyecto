<?php
require_once '../../model/Categoria.php';

if (!isset($_GET['id'])) {
    echo "ID no proporcionado";
    exit();
}

$categoria = new Categoria();
$data = $categoria->obtenerPorId($_GET['id']);

if (!$data) {
    echo "Categoría no encontrada";
    exit();
}
?>

<h2>¿Estás seguro de que deseas eliminar esta categoría?</h2>

<p><strong>ID:</strong> <?= $data['ID_Categorias'] ?></p>
<p><strong>Tipo:</strong> <?= $data['Tipo'] ?></p>

<form method="POST" action="../../controller/CategoriaController.php?accion=eliminar">
    <input type="hidden" name="id" value="<?= $data['ID_Categorias'] ?>">
    <button type="submit">Sí, eliminar</button>
    <a href="index.php">Cancelar</a>
</form>
