<?php

include 'funciones/funciones.php';
// $usuario = $_POST['usuario'];
// $nombre = $_POST['nombre'];
// $password = $_POST['password'];
// $id_registro = $_POST['id_registro'];

// // Comprobación de existencia y declaración de variables
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

if (isset($_POST['registro']) && $_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}


?>