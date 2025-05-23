<?php
require_once '../../model/proveedor.php';
$p = new Proveedor();
$data = $p->obtenerPorId($_GET['id']);
?>
<h2>Editar Proveedor</h2>
<form action="../../controller/ProveedorController.php?accion=actualizar" method="POST">
    <input type="hidden" name="id" value="<?= $data['ID_Proveedores'] ?>">
    <label>Nombre:</label><input type="text" name="nombre" value="<?= $data['Nombre'] ?>" required><br>
    <label>Apellidos:</label><input type="text" name="apellidos" value="<?= $data['Apellidos'] ?>" required><br>
    <label>País de Origen:</label><input type="text" name="pais" value="<?= $data['Pais_Origen'] ?>" required><br>
    <label>Contacto:</label><input type="text" name="contacto" value="<?= $data['Contacto'] ?>" required><br>
    <label>Email:</label><input type="email" name="email" value="<?= $data['Email'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>

