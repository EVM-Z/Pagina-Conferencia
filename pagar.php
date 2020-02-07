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

/*
$produto = htmlspecialchars($_POST['producto']);
$precio = htmlspecialchars($_POST['precio']);
$precio = (int) $precio;
var_dump($precio);
$envio = 0;
$total = $precio + $envio;

$compra = new Payer();
$compra->setPaymentMethod('paypal');

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