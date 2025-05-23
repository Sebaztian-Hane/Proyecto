<?php
require_once 'conexion.php';

class Categoria {
    private $conexion;

    public function __construct() {
        $this->conexion = conectar();
    }

    public function obtenerTodas() {
        $sql = "SELECT * FROM CATEGORIAS";
        return $this->conexion->query($sql);
    }

    public function crear($tipo) {
        $stmt = $this->conexion->prepare("INSERT INTO CATEGORIAS (Tipo) VALUES (?)");
        $stmt->bind_param("s", $tipo);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM CATEGORIAS WHERE ID_Categorias = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $tipo) {
        $stmt = $this->conexion->prepare("UPDATE CATEGORIAS SET Tipo = ? WHERE ID_Categorias = ?");
        $stmt->bind_param("si", $tipo, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM CATEGORIAS WHERE ID_Categorias = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
