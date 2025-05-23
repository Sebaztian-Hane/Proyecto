<?php
require_once 'conexion.php';

class Proveedor {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM PROVEEDORES";
        return $this->conexion->query($sql);
    }

    public function crear($nombre, $apellidos, $pais, $contacto, $email) {
        $stmt = $this->conexion->prepare("INSERT INTO PROVEEDORES (Nombre, Apellidos, Pais_Origen, Contacto, Email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $apellidos, $pais, $contacto, $email);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM PROVEEDORES WHERE ID_Proveedores = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombre, $apellidos, $pais, $contacto, $email) {
        $stmt = $this->conexion->prepare("UPDATE PROVEEDORES SET Nombre=?, Apellidos=?, Pais_Origen=?, Contacto=?, Email=? WHERE ID_Proveedores=?");
        $stmt->bind_param("sssssi", $nombre, $apellidos, $pais, $contacto, $email, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM PROVEEDORES WHERE ID_Proveedores = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
