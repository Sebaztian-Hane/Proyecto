<?php
require_once 'conexion.php';

class Venta {
    private $conn;

    public function __construct() {
        $this->conn = conectar();
    }

    public function registrar($fecha, $metodoPago, $productos, $cantidades) {
        $total = 0;

        foreach ($productos as $i => $idProducto) {
            $cantidad = $cantidades[$i];
            $precio = $this->obtenerPrecio($idProducto);
            $total += $precio * $cantidad;
        }

        $stmt = $this->conn->prepare("INSERT INTO VENTAS (Fecha, Total, Metodo_Pago) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $fecha, $total, $metodoPago);
        $stmt->execute();
        $idVenta = $stmt->insert_id;

        foreach ($productos as $i => $idProducto) {
            $cantidad = $cantidades[$i];
            $precio = $this->obtenerPrecio($idProducto);
            $subtotal = $precio * $cantidad;

            $stmt2 = $this->conn->prepare("INSERT INTO DETALLES_VENTA (ID_Venta, ID_Producto, Cantidad, Subtotal) VALUES (?, ?, ?, ?)");
            $stmt2->bind_param("iiid", $idVenta, $idProducto, $cantidad, $subtotal);
            $stmt2->execute();
        }
    }

    private function obtenerPrecio($idProducto) {
        $sql = "SELECT Precio_Venta FROM PRODUCTOS WHERE ID_Producto = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idProducto);
        $stmt->execute();
        $stmt->bind_result($precio);
        $stmt->fetch();
        $stmt->close();
        return $precio;
    }
    public function obtenerVentasConDetalles() {
        $sql = "SELECT VENTAS.ID_Ventas, VENTAS.Fecha, VENTAS.Total,
                    METODOS_PAGOS.Metodo,
                    DETALLES_VENTA.ID_Producto, PRODUCTOS.Nombre,
                    DETALLES_VENTA.Cantidad, DETALLES_VENTA.Subtotal
                FROM VENTAS
                JOIN METODOS_PAGOS ON VENTAS.Metodo_Pago = METODOS_PAGOS.ID_MetodoPago
                JOIN DETALLES_VENTA ON VENTAS.ID_Ventas = DETALLES_VENTA.ID_Venta
                JOIN PRODUCTOS ON DETALLES_VENTA.ID_Producto = PRODUCTOS.ID_Producto
                ORDER BY VENTAS.ID_Ventas DESC";
        return $this->conn->query($sql);

    }

}


