<?php
error_reporting(E_ALL ^ E_NOTICE);

include 'funciones/funciones.php';

$titulo = $_POST['titulo_evento'];
$categoria_id = $_POST['categoria_evento'];
$invitado_id = $_POST['invitado'];
// Obtener la fecha
$fecha = $_POST['fecha_evento'];
// Cambiamos la fecha al formato de la BD
$fecha_formateada = date('Y-m-d', strtotime($fecha));
// Obtener la hora
$hora = $_POST['hora_evento'];
// Cambiamos la hora al formato de la BD
$hora_formateada = date('H:i', strtotime($hora));

$id_registro = $_POST['id_registro'];

// Valor para borrar
$id_borrar = $_POST['id'];


if (isset($_POST['registro']) && $_POST['registro']  == 'nuevo') {
    try {
        $stmt = $conn->prepare('INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES ( ?, ?, ?, ?, ?) ');
        $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
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
        $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE evento_id = ? ');
        // nombre_evento = string
        // fecha_evento = string
        // hora_evento = string
        // id_cat_evento = int
        // id_inv = int
        // evento_id = int
        
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id, $id_registro);
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
        $stmt = $conn->prepare('DELETE FROM eventos WHERE evento_id = ? ');
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