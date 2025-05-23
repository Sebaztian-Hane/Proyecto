<h2>Nuevo Cliente</h2>
<form action="../../controller/ClienteController.php?accion=crear" method="POST">
    <label>Nombre:</label><input type="text" name="nombre" required><br>
    <label>Teléfono:</label><input type="text" name="telefono" required><br>
    <label>Dirección:</label><input type="text" name="direccion" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Volver</a>