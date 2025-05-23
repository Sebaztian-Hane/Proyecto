<?php
require_once '../../model/Cliente.php';
$c = new Cliente();
$data = $c->obtenerPorId($_GET['id']);
?>
<h2>Editar Cliente</h2>
<form action="../../controller/ClienteController.php?accion=actualizar" method="POST">
    <input type="hidden" name="id" value="<?= $data['ID_Cliente'] ?>">
    <label>Nombre:</label><input type="text" name="nombre" value="<?= $data['Nombre'] ?>" required><br>
    <label>Teléfono:</label><input type="text" name="telefono" value="<?= $data['Telefono'] ?>" required><br>
    <label>Dirección:</label><input type="text" name="direccion" value="<?= $data['Direccion'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>
