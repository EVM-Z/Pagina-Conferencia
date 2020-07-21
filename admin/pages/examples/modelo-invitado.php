<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once 'funciones/funciones.php';

// Los valores de la derecha son de la consola del navegador
// Son los valores enviados
$nombre = $_POST['nombre_invitado'];
$apellido = $_POST['apellido_invitado'];
$biografia = $_POST['biografia_invitado'];

if ($_POST['registro']  == 'nuevo') {
    // Comprobar que los datos se estan enviando
    /*
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );
    die(json_encode($respuesta));
    */
    
    $directorio = "../../../img/invitados/";

    // is_dir verifica si el directorio existe
    if (!is_dir($directorio)) {
        // Si no existe el directorio, se crea
        mkdir($directorio, 0755, true);
    } else {
        $result = "No se cargo";
    }

    if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    
    try {
        $stmt = $conn->prepare('INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ?) ');
        // Las variables estan declaradas de forma global
        $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;

        

        if ($stmt->affected_rows) {
            
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                // Variable reclarado en move_uploaded_file
                'resultado_imagen' => $imagen_resultado
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


if($_POST['registro'] == 'actualizar'){
    
    try {
        // editado = NOW() sirve para no mostrar mensaje de error al presionar 2 veces seguidas el boton de guardar
        $stmt = $conn->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ? ');
        // nombre_evento = string
        // icono = string
        // id_registro = int
        
        $stmt->bind_param('ssi', $nombre_categoria, $icono, $id_registro);
        $stmt->execute();
        
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
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

if ($_POST['registro'] == 'eliminar') {
    try {
        $stmt = $conn->prepare('DELETE FROM categoria_evento WHERE id_categoria = ? ');
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
        
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}
?>