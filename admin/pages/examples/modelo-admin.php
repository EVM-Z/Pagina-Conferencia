<?php

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




if (isset($_POST['registro']) && $_POST['registro']  == 'nuevo') {

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

if (isset($_POST['registro']) && $_POST['registro']  == 'actualizar') {
    die(json_encode($_POST));
}


if (isset($_POST['login-admin'])) {
    // Leemos las variables que se envian
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        include 'funciones/funciones.php';
        // php statement
        $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);
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