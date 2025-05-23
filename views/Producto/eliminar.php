<?php
require_once '../../model/Producto.php';
$p = new Producto();
$data = $p->obtenerPorId($_GET['id']);
?>
<h2>¿Eliminar Producto?</h2>
<p><strong>Nombre:</strong> <?= $data['Nombre'] ?></p>
<p><strong>Marca:</strong> <?= $data['Marca'] ?></p>
<p><strong>Precio Venta:</strong> <?= $data['Precio_Venta'] ?></p>

<form method="POST" action="../../controller/ProductoController.php?accion=eliminar">
    <input type="hidden" name="id" value="<?= $data['ID_Producto'] ?>">
    <button type="submit">Sí, eliminar</button>
    <a href="index.php">Cancelar</a>
</form>
