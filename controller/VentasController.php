<?php
require_once '../model/conexion.php';
require_once '../model/Venta.php'; 

$venta = new Venta();              
$ventas = $venta->obtenerVentasConDetalles();

$accion = $_GET['accion'] ?? '';

if ($accion == 'registrar') {
    $fecha = $_POST['fecha'];
    $metodo_pago = $_POST['metodo_pago'];
    $productos = $_POST['producto_id'];
    $cantidades = explode(',', $_POST['cantidades']);

    $venta->registrar($fecha, $metodo_pago, $productos, $cantidades);
    
    header('Location: ../views/Venta/index.php?msg=Venta registrada');
}

