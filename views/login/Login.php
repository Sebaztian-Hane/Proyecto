<?php
require_once '../../model/conexion.php';
$conn = conectar();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $sql = "SELECT * FROM encargados WHERE Cargo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre_completo = $row["Nombres"] . $row["Apellidos"];
        
 
        if ($contraseña === $nombre_completo) {

            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION["nombre_completo"] = $nombre_completo; 
            echo "Login exitoso. Bienvenido " . $row["Nombres"];

            header("Location: ../menu/menu.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" href="LoginCss.css" />
  </head>
  <body class="login-body">
    <div class="login-container">
      <img
        src="https://images.vexels.com/media/users/3/142890/isolated/preview/4ea2d7c4bf3cad23a4f18ee58752deb8-logotipo-de-anillos-de-alta-tecnologia.png?w=360"
        alt="Logo TecnoSoluciones"
        class="logo"
      />
      <h2>Acceso al Sistema</h2>
      <form action="" method="post">
        <div class="input-group">
          <label for="usuario">Usuario</label>
          <div class="input-with-icon">
            <img
              src="https://cdn-icons-png.flaticon.com/512/64/64572.png"
              alt="Usuario"
              class="input-icon"
            />
            <input
              type="text"
              id="usuario"
              name="usuario"
              placeholder="Ingrese su usuario"
              required
            />
          </div>
        </div>
        <div class="input-group">
          <label for="clave">Contraseña</label>
          <div class="input-with-icon">
            <img
              src="https://images.icon-icons.com/37/PNG/512/password_3715.png"
              alt="Contraseña"
              class="input-icon"
            />
            <input
              type="password"
              id="contraseña" 
              name="contraseña"
              placeholder="Ingrese su contraseña"
              required
            />
          </div>
        </div>
        <button type="submit" value="Ingresar">Ingresar</button>
      </form>
    </div>
  </body>
</html>
