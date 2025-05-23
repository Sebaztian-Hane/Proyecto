<h2>Nuevo Encargado</h2>
<form action="../../controller/EncargadoController.php?accion=crear" method="POST">
    <label>Nombres:</label><input type="text" name="nombres" required><br>
    <label>Apellidos:</label><input type="text" name="apellidos" required><br>
    <label>Cargo:</label><input type="text" name="cargo" required><br>
    <label>Teléfono:</label><input type="text" name="telefono" required><br>
    <label>Salario:</label><input type="number" step="0.01" name="salario" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Volver</a>
