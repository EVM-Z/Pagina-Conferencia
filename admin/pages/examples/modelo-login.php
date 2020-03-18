<?php
include 'funciones/funciones.php';
// Comprobación de existencia y declaración de variables
if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
}
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}
if (isset($_POST['id_registro'])) {
    $id_registro = $_POST['id_registro'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $opciones_hash = array(
        'cost' => 12
    );
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones_hash);
}


if (isset($_POST['login-admin'])) {

    try {
        // php statement
        $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado);
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if($existe){
                // Si el usuario existe
                if (password_verify($password, $password_admin)) {
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nombre'] = $nombre_admin;
                    $respuesta = array(
                        'respuesta' => 'exitoso',
                        'usuario' => $nombre_admin
                    );
                } else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            } else{
                // Si el usuario no existe
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        }

        // Cerramos las conexiones
        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        echo "Error:" . $e->getMessage();
    }

    die(json_encode($respuesta));
}

?>