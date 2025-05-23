<?php
class MenuController {
    public function mostrarMenu() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: login.php");
            exit();
        }
        
        include 'views/menu.php'; 
    }
}