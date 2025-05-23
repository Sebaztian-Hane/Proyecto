<?php
require_once '../../model/Encargado.php';
$e = new Encargado();
$data = $e->obtenerPorId($_GET['id']);
?>
<h2>¿Eliminar este encargado?</h2>
<p><strong>Nombre:</strong> <?= $data['Nombres'] . ' ' . $data['Apellidos'] ?></p>
<p><strong>Cargo:</strong> <?= $data['Cargo'] ?></p>

<form method="POST" action="../../controller/EncargadoController.php?accion=eliminar">
    <input type="hidden" name="id" value="<?= $data['ID_Encargados'] ?>">
    <button type="submit">Sí, eliminar</button>
    <a href="index.php">Cancelar</a>
</form>
