<?php
require_once '../../model/proveedor.php';
$p = new Proveedor();
$data = $p->obtenerPorId($_GET['id']);
?>
<h2>¿Eliminar Proveedor?</h2>
<p><strong>Nombre:</strong> <?= $data['Nombre'] ?> <?= $data['Apellidos'] ?></p>
<p><strong>Email:</strong> <?= $data['Email'] ?></p>

<form method="POST" action="../../controller/ProveedorController.php?accion=eliminar">
    <input type="hidden" name="id" value="<?= $data['ID_Proveedores'] ?>">
    <button type="submit">Sí, eliminar</button>
    <a href="index.php">Cancelar</a>
</form>
