<?php

if (!isset($_POST['submit'])) {
    exit("Hubo un error");
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\APi\RedirectUrls;
use PayPal\Api\Payment;

require 'includes/paypal.php';

if(isset($_POST['submit'])):
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $regalo=$_POST['regalo'];
        $total=$_POST['total_pedido'];
        $fecha=date('Y-m-d H:i:s');
        // Pedidos
        $boletos=$_POST['boletos'];
        $numero_boletos=$boletos;
        $pedidoExtra=$_POST['pedido_extra'];
        
        $camisas=$_POST['pedido_extra']['camisas']['cantidad'];
        $precioCamisa=$_POST['pedido_extra']['camisas']['precio'];

        $etiquetas=$_POST['pedido_extra']['etiquetas']['cantidad'];
        $precioEtiquetas=$_POST['pedido_extra']['etiquetas']['precio'];

        // Llamamos a la funcion JSON
        include_once 'includes/funciones/funciones.php';
        $pedido=productos_json($boletos, $camisas, $etiquetas);
        // Eventos
        $eventos=$_POST['registro'];
        $registro=eventos_json($eventos);
        

        try {
                require_once('includes/funciones/bd_conexion.php');
                // Preparamos los datos prepare
                $stmt=$conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?) ");
                // Decimos que datos vamos a dar bind_param
                // Las s represetan cadenas, la i representa un entero
                $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
                // Executamos los datos execute
                $stmt->execute();
                $ID_registro=$stmt->insert_id;
                // Cerramos el stamend
                $stmt->close();
                // Cerramos la conexion
                $conn->close();
                // Evita meter registros repetidos al cargar de nuevo una pagina
                // header('Location: validar_registro.php?exitoso=1');
        } catch (\Exception $e) {
                $error = $e->getMessage();
        }

endif;

$compra = new Payer();
$compra->setPaymentMethod('paypal');


$articulo = new Item();
$articulo->setName($producto)
        ->setCurrency('MXN')
        ->setQuantity(1)
        ->setPrice($precio);

$i=0;
$arreglo_pedido=array();
foreach ($numero_boletos as $key => $value) {
        if ((int) $value['cantidad'] > 0) {
                // Crea las variables de articulo segun se vaya creando articulo1, articulo2, articulo3...
                ${"articulo$i"} = new Item();
                // Se agrega al final del arreglo
                // En el arreglo se agregan todos los objetos que se crean
                $arreglo_pedido[]=${"articulos$i"};
                ${"articulo$i"}->setName('Pase: ' . $key)
                                ->setCurrency('USD')
                                ->setQuantity((int) $value['cantidad'])
                                ->setPrice((int) $value['precio']);
                $i++;
        }
}

$i=0;
foreach ($pedidoExtra as $key => $value) {
        if ((int) $value['cantidad'] > 0) {
                if ($key == 'camisas') {
                        $precio = (float) $value['precio'] * .93;
                } else{
                        $precio = (int) $value['precio'];
                }
                ${"articulo$i"} = new Item();
                $arreglo_pedido[]=${"articulos$i"};
                ${"articulo$i"}->setName('Extras: ' . $key)
                                ->setCurrency('USD')
                                ->setQuantity((int) $value['cantidad'])
                                ->setPrice($precio);
                $i++;
        }
}


$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);


// Cantidad a pagar
$cantidad = new Amount();
$cantidad->setCurrency('USD')
        ->setTotal($total);

// echo $total;


$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
        ->setItemList($listaArticulos)
        ->setDescription('Pago GDLWEBCAMP')
        ->setInvoiceNumber($ID_registro);

echo $transaccion->getInvoiceNumber();
        

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exitoso=true&id_pago={$ID_registro}")
                ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exitoso=false&id_pago={$ID_registro}");



$pago = new Payment();
$pago->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redireccionar)
        ->setTransactions(array($transaccion));

try {
        $pago->create($apiContext);
} catch (Paypal\Exception\PayPalConnectionException $pce) {
        echo "<pre>";
        print_r(json_decode($pce->getData()));
        exit;
        echo "</pre>";
}

// Obtiene el link de aprovacion getApprovalLink
$aprobado = $pago->getApprovalLink();
header("Location: {$aprobado}");

?>