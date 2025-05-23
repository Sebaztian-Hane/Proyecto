<?php
require_once '../model/Cliente.php';
$cliente = new Cliente();

$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'crear':
        $cliente->crear($_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
        header("Location: ../views/Cliente/index.php");
        break;

    case 'actualizar':
        $cliente->actualizar($_POST['id'], $_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
        header("Location: ../views/Cliente/index.php");
        break;

    case 'eliminar':
        $id = $_POST['id'] ?? $_GET['id'];
        $cliente->eliminar($id);
        header("Location: ../views/Cliente/index.php");
        break;
}
