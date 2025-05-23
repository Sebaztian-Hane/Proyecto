<?php
require_once 'conexion.php';

class Producto {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function obtenerTodos() {
    $sql = "SELECT PRODUCTOS.*, CATEGORIAS.Tipo 
            FROM PRODUCTOS 
            JOIN CATEGORIAS ON PRODUCTOS.Categoria = CATEGORIAS.ID_Categorias";
    return $this->conexion->query($sql);
}


    public function crear($nombre, $marca, $categoria, $precioCompra, $precioVenta, $stock) {
        $stmt = $this->conexion->prepare("INSERT INTO PRODUCTOS (Nombre, Marca, Categoria, Precio_Compra, Precio_Venta, Stock) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiddi", $nombre, $marca, $categoria, $precioCompra, $precioVenta, $stock);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM PRODUCTOS WHERE ID_Producto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombre, $marca, $categoria, $precioCompra, $precioVenta, $stock) {
        $stmt = $this->conexion->prepare("UPDATE PRODUCTOS SET Nombre=?, Marca=?, Categoria=?, Precio_Compra=?, Precio_Venta=?, Stock=? WHERE ID_Producto=?");
        $stmt->bind_param("ssiddii", $nombre, $marca, $categoria, $precioCompra, $precioVenta, $stock, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM PRODUCTOS WHERE ID_Producto=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function obtenerCategorias() {
        return $this->conexion->query("SELECT * FROM CATEGORIAS");
    }
}
