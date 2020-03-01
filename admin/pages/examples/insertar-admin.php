<?php

if (isset($_POST['agregar-admin'])) {

    // Vemos que se envio con el metodo POST
    // die(json_encode($_POST));

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    // Arreglo asociativo
    $opciones = array(
            'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
        include 'funciones/funciones.php';
        // php statement
        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        // En caso de que no haya registro el $id_registro=0
        if ($id_registro > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro
            );
            
        } else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));

}

?>