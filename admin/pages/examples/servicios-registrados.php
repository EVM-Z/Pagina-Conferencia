<?php
// Antes que nada, verificamos la sesion
include 'funciones/sesiones.php';
include 'funciones/funciones.php';

$sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registro) ORDER BY fecha_registro ";
$resultado = $conn->query($sql);

$arreglo_registros = array();
while ($registro_dia = $resultado->fetch_assoc()) {
    // Tomamos el valor del json
    $fecha = $registro_dia['fecha_registro'];
    // Tomamos año, mes y dia, y no las horas, minutos y segundos
    $registro['fecha'] = date('Y-m-d', strtotime($fecha));
    // Cuantas personas se inscribieron
    $registro['cantidad'] = $registro_dia['resultado'];
    // Enlazamos al arreglo que esta afuera
    $arreglo_registros[] = $registro;
}

// json_encode convierte un arreglo en json
echo json_encode($arreglo_registros);
?>