<?php
require_once '../../model/Categoria.php';
$categoria = new Categoria();
$data = $categoria->obtenerPorId($_GET['id']);
?>
<form action="../../controller/Categoriacontroller.php?accion=actualizar" method="POST">
    <input type="hidden" name="id" value="<?= $data['ID_Categorias'] ?>">
    <label>Tipo:</label>
    <input type="text" name="tipo" value="<?= $data['Tipo'] ?>" required>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>
