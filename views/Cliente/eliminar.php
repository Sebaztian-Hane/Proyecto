<?php
require_once '../../model/Cliente.php';
$c = new Cliente();
$data = $c->obtenerPorId($_GET['id']);
?>
<h2>¿Eliminar Cliente?</h2>
<p><strong>Nombre:</strong> <?= $data['Nombre'] ?></p>
<p><strong>Teléfono:</strong> <?= $data['Telefono'] ?></p>

<form method="POST" action="../../controller/ClienteController.php?accion=eliminar">
    <input type="hidden" name="id" value="<?= $data['ID_Cliente'] ?>">
    <button type="submit">Sí, eliminar</button>
    <a href="index.php">Cancelar</a>
</form>
