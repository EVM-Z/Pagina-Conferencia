<?php

// include 'funciones/funciones.php';
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
    die(json_encode($_POST));
}


?>