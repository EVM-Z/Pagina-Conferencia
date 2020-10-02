<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once 'funciones/funciones.php';

// Los valores de la derecha, aparecen en la consola
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];

// Boletos
$boletos_adquiridos = $_POST['boletos'];
// Camisas y Etiquetas
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);

$total = $_POST['total_pedido'];
$regalo = $_POST['regalo'];

$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);

// $fecha_registro = $_POST['fecha_registro'];
// $id_registro = $_POST['id_registro'];

if ($_POST['registro']  == 'nuevo') {
    
    try {
        $stmt = $conn->prepare('INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 1 ) ');
        // Pase articulo = $pedido
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
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
    
    die(json_encode($_POST));
    
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