<?php
require_once 'conexion.php';

class Encargado {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function obtenerTodos() {
        return $this->conexion->query("SELECT * FROM ENCARGADOS");
    }

    public function crear($nombres, $apellidos, $cargo, $telefono, $salario) {
        $stmt = $this->conexion->prepare("INSERT INTO ENCARGADOS (Nombres, Apellidos, Cargo, Telefono, Salario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $nombres, $apellidos, $cargo, $telefono, $salario);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM ENCARGADOS WHERE ID_Encargados = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombres, $apellidos, $cargo, $telefono, $salario) {
        $stmt = $this->conexion->prepare("UPDATE ENCARGADOS SET Nombres=?, Apellidos=?, Cargo=?, Telefono=?, Salario=? WHERE ID_Encargados=?");
        $stmt->bind_param("ssssdi", $nombres, $apellidos, $cargo, $telefono, $salario, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM ENCARGADOS WHERE ID_Encargados = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
