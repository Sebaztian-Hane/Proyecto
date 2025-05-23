<?php
require_once 'conexion.php';

class Cliente {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM CLIENTES";
        return $this->conexion->query($sql);
    }

    public function crear($nombre, $telefono, $direccion) {
        $stmt = $this->conexion->prepare("INSERT INTO CLIENTES (Nombre, Telefono, Direccion) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $telefono, $direccion);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM CLIENTES WHERE ID_Cliente = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombre, $telefono, $direccion) {
        $stmt = $this->conexion->prepare("UPDATE CLIENTES SET Nombre=?, Telefono=?, Direccion=? WHERE ID_Cliente=?");
        $stmt->bind_param("sssi", $nombre, $telefono, $direccion, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM CLIENTES WHERE ID_Cliente = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
