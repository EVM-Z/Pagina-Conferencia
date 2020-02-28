<?php
include 'funciones/funciones.php';

if (isset($_POST['agregar-admin'])) {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    // Arreglo asociativo
    $opciones = array(
            'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
}

?>