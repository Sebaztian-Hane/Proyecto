<?php
require_once '../../model/Encargado.php';
$e = new Encargado();
$data = $e->obtenerPorId($_GET['id']);
?>
<h2>Editar Encargado</h2>
<form action="../../controller/EncargadoController.php?accion=actualizar" method="POST">
    <input type="hidden" name="id" value="<?= $data['ID_Encargados'] ?>">
    <label>Nombres:</label><input type="text" name="nombres" value="<?= $data['Nombres'] ?>" required><br>
    <label>Apellidos:</label><input type="text" name="apellidos" value="<?= $data['Apellidos'] ?>" required><br>
    <label>Cargo:</label><input type="text" name="cargo" value="<?= $data['Cargo'] ?>" required><br>
    <label>Teléfono:</label><input type="text" name="telefono" value="<?= $data['Telefono'] ?>" required><br>
    <label>Salario:</label><input type="number" step="0.01" name="salario" value="<?= $data['Salario'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>
