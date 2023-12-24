<?php
require_once('../src/conexion.php');

if (isset($_POST['btnIniciarSesion'])) {
    $usuario = $_POST['inpUsuario'];
    $contrasena = $_POST['inpContrasena'];

    $passwd = md5($contrasena);

    if (empty($usuario) || empty($contrasena)) {
        echo '<script type="text/javascript">
            window.alert("Debe Ingresar Usuario y Contraseña");
            window.location.href="login.html";
        </script>';
        return false;
    }

    $sql = "select * from usuario where username = ? and contrasena = ?; ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        error_log("Error al preparar la consulta: " . mysqli_error($conn));
        return false;
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $passwd);
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);
        $fila = mysqli_fetch_assoc($resultado);

        if ($fila && $passwd === $fila['contrasena']) {
            if ($fila['idPerfil'] === 1) {
                echo "Bienvenido estimado Administrador";
            }

            if ($fila['idPerfil'] === 2) {
                echo "Bienvenido al modulo de Bodega";
            }

            if ($fila['idPerfil'] === 4) {
                echo "Bienvenido al modulo de Finanzas";
            }

            if ($fila['idPerfil'] === 5) {
                echo "Bienvenido al modulo de Cocina";
            }
        } else {
            echo '<script type="text/javascript">
                window.alert("Usuario y Contraseña Incorrectos");
                window.location.href="login.html";
            </script>';
            return false;
        }
    }

} else {
    header("Location: login.php");
    exit();
}

?>