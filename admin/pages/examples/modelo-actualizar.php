<?php

include 'funciones/funciones.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];

// Comprobación de existencia y declaración de variables
// if (isset($_POST['usuario'])) {
//     $usuario = $_POST['usuario'];
// }
// if (isset($_POST['nombre'])) {
//     $nombre = $_POST['nombre'];
// }
// if (isset($_POST['id_registro'])) {
//     $id_registro = $_POST['id_registro'];
// }
// if (isset($_POST['password'])) {
//     $password = $_POST['password'];
    // $opciones_hash = array(
    //     'cost' => 12
    // );
    // $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones_hash);
// }



// if ($_POST['registro']  == 'actualizar') {
if (isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){

    try {
        // Si es password esta vacio
        if (empty($_POST['password'])) {
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ? ");
            $stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
            // Si el password tiene algo
        } else {
            $opciones = array(
                'cost' => 12
            );
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id_admin = ? ');
            $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
        }
        $stmt->execute();
        // Cuando hay cambios
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id
            );
        } else{
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