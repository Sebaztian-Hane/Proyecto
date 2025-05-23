<?php
require_once '../model/Producto.php';
$producto = new Producto();

$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'crear':
        $producto->crear($_POST['nombre'], $_POST['marca'], $_POST['categoria'], $_POST['precio_compra'], $_POST['precio_venta'], $_POST['stock']);
        header("Location: ../views/Producto/index.php");
        break;

    case 'actualizar':
        $producto->actualizar($_POST['id'], $_POST['nombre'], $_POST['marca'], $_POST['categoria'], $_POST['precio_compra'], $_POST['precio_venta'], $_POST['stock']);
        header("Location: ../views/Producto/index.php");
        break;

    case 'eliminar':
        $id = $_POST['id'] ?? $_GET['id'];
        $producto->eliminar($id);
        header("Location: ../views/Producto/index.php");
        break;
}
