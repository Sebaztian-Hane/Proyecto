<?php
require_once '../../model/producto.php';
$p = new Producto();
$categorias = $p->obtenerCategorias();
?>
<h2>Nuevo Producto</h2>
<form action="../../controller/ProductoController.php?accion=crear" method="POST">
    <label>Nombre:</label><input type="text" name="nombre" required><br>
    <label>Marca:</label><input type="text" name="marca" required><br>
    <label>Categoria:</label>
    <select name="categoria" required>
        <?php while ($c = $categorias->fetch_assoc()): ?>
            <option value="<?= $c['ID_Categorias'] ?>"><?= $c['Tipo'] ?></option>
        <?php endwhile; ?>
    </select><br>
    <label>Precio Compra:</label><input type="number" step="0.01" name="precio_compra" required><br>
    <label>Precio Venta:</label><input type="number" step="0.01" name="precio_venta" required><br>
    <label>Stock:</label><input type="number" name="stock" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Volver</a>
