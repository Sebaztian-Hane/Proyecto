<h2>Nuevo Proveedor</h2>
<form action="../../controller/ProveedorController.php?accion=crear" method="POST">
    <label>Nombre:</label><input type="text" name="nombre" required><br>
    <label>Apellidos:</label><input type="text" name="apellidos" required><br>
    <label>País de Origen:</label><input type="text" name="pais" required><br>
    <label>Contacto:</label><input type="text" name="contacto" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <button type="submit">Guardar</button>
</form>
<a href="index.php">Volver</a>
