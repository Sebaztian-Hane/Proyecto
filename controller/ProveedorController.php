<?php
require_once '../model/Proveedor.php';
$proveedor = new Proveedor();

$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'crear':
        $proveedor->crear($_POST['nombre'], $_POST['apellidos'], $_POST['pais'], $_POST['contacto'], $_POST['email']);
        header("Location: ../views/proveedores/index.php");
        break;

    case 'actualizar':
        $proveedor->actualizar($_POST['id'], $_POST['nombre'], $_POST['apellidos'], $_POST['pais'], $_POST['contacto'], $_POST['email']);
        header("Location: ../views/proveedores/index.php");
        break;

    case 'eliminar':
        $id = $_POST['id'] ?? $_GET['id'];
        $proveedor->eliminar($id);
        header("Location: ../views/proveedores/index.php");
        break;
}
