<?php

include 'funciones/funciones.php';

$titulo = $_POST['titulo_evento'];
$categoria_id = $_POST['categoria_evento'];
$invitado_id = $_POST['invitado'];
// Obtener la fecha
$fecha = $_POST['fecha_evento'];
// Cambiamos la fecha al formato de la BD
$fecha_formateada = date('Y-m-d', strtotime($fecha));
$hora = $_POST['hora_evento'];


if (isset($_POST['registro']) && $_POST['registro']  == 'nuevo') {
    try {
        $stmt = $conn->prepare('INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES ( ?, ?, ?, ?, ?) ');
        $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora, $categoria_id, $invitado_id);
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
?>