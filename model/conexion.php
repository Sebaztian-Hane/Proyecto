<?php
function conectar(){
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "cosmeticos_nailart";


$conn = new mysqli($host, $usuario, $contrasena, $basedatos);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
return $conn;

}
?>
