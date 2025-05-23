<?php
require_once '../../model/Producto.php';
$p = new Producto();
$data = $p->obtenerPorId($_GET['id']);
$categorias = $p->obtenerCategorias();
?>
<h2>Editar Producto</h2>
<form action="../../controller/ProductoController.php?accion=actualizar" method="POST">
    <input type="hidden" name="id" value="<?= $data['ID_Producto'] ?>">
    <label>Nombre:</label><input type="text" name="nombre" value="<?= $data['Nombre'] ?>" required><br>
    <label>Marca:</label><input type="text" name="marca" value="<?= $data['Marca'] ?>" required><br>
    <label>Categoria:</label>
    <select name="categoria" required>
        <?php while ($c = $categorias->fetch_assoc()): ?>
            <option value="<?= $c['ID_Categorias'] ?>" <?= $c['ID_Categorias'] == $data['Categoria'] ? 'selected' : '' ?>>
                <?= $c['Tipo'] ?>
            </option>
        <?php endwhile; ?>
    </select><br>
    <label>Precio Compra:</label><input type="number" step="0.01" name="precio_compra" value="<?= $data['Precio_Compra'] ?>" required><br>
    <label>Precio Venta:</label><input type="number" step="0.01" name="precio_venta" value="<?= $data['Precio_Venta'] ?>" required><br>
    <label>Stock:</label><input type="number" name="stock" value="<?= $data['Stock'] ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>
