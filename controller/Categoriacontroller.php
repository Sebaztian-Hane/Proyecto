<?php
require_once '../model/categoria.php';
$categoria = new Categoria();

$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'crear':
        $tipo = $_POST['tipo'];
        $categoria->crear($tipo);
        header("Location: ../views/Categoria/index.php");
        break;

    case 'actualizar':
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $categoria->actualizar($id, $tipo);
        header("Location: ../views/Categoria/index.php");
        break;

    case 'eliminar':
        $id = $_POST['id'] ?? $_GET['id'];
        $categoria->eliminar($id);
        header("Location: ../views/Categoria/index.php");
        break;
}
