<?php
require_once '../model/Encargado.php';
$encargado = new Encargado();

$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'crear':
        $encargado->crear($_POST['nombres'], $_POST['apellidos'], $_POST['cargo'], $_POST['telefono'], $_POST['salario']);
        header("Location: ../views/Encargado/index.php");
        break;

    case 'actualizar':
        $encargado->actualizar($_POST['id'], $_POST['nombres'], $_POST['apellidos'], $_POST['cargo'], $_POST['telefono'], $_POST['salario']);
        header("Location: ../views/Encargado/index.php");
        break;

    case 'eliminar':
        $encargado->eliminar($_POST['id'] ?? $_GET['id']);
        header("Location: ../views/Encargado/index.php");
        break;
}
