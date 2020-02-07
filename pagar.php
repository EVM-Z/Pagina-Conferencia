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
        $camisas=$_POST['pedido_camisas'];
        $etiquetas=$_POST['pedido_etiquetas'];
        // Llamamos a la funcion JSON
        include_once 'includes/funciones/funciones.php';
        $pedido=productos_json($boletos, $camisas, $etiquetas);
        // Eventos
        $eventos=$_POST['registro'];
        $registro=eventos_json($eventos);

        echo "<pre>";
        var_dump($_POST);
        echo "<pre>";
        
        exit;
        endif;
        try {
                require_once('includes/funciones/bd_conexion.php');
                // Preparamos los datos prepare
                $stmt=$conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?) ");
                // Decimos que datos vamos a dar bind_param
                // Las s represetan cadenas, la i representa un entero
                $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
                // Executamos los datos execute
                $stmt->execute();
                // Cerramos el stamend
                $stmt->close();
                // Cerramos la conexion
                $conn->close();
                // Evita meter registros repetidos al cargar de nuevo una pagina
                header('Location: validar_registro.php?exitoso=1');
        } catch (\Exception $e) {
                $error = $e->getMessage();
        }



$compra = new Payer();
$compra->setPaymentMethod('paypal');

/*
$articulo = new Item();
$articulo->setName($produto)
        ->setCurrency('MXN')
        ->setQuantity(1)
        ->setPrice($precio);

$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));

$detalles = new Details();
$detalles->setShipping($envio)
        ->setSubtotal($precio);

// Cantidad a pagar
$cantidad = new Amount();
$cantidad->setCurrency('MXN')
        ->setTotal($precio)
        ->setDetails($detalles);

$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
        ->setItemList($listaArticulos)
        ->setDescription('Pago ')
        ->setInvoiceNumber(uniqid());
        

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true")
        ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");

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
*/
?>