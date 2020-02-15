<?php include_once 'includes/templates/header.php';

// Contiene las credenciales del cliente y secret
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require 'includes/paypal.php';

?>
<section class="seccion contenedor">
    <h2>Resumen Registro</h2>
    <?php
        $paymentId = $_GET['paymentId'];
        $id_pago = (int) $_GET['id_pago'];

        // Paticion a REST API
        $pago = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        // Especificamos el pago
        $execution->setPayerId($_GET['PayerID']);
        
        // Resultado tiene la informacion de la transaccion
        $resultado = $pago->execute($execute, $apiContext);

        $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

        // var_dump($respuesta);


        if ($resultado == "completed") {
            echo "<div class'resultado correcto'>";
            echo "El pago se realiazo correctamente <br>";
            echo "El ID es {$paymentId}";
            echo "</div>";

            require_once('includes/funciones/bd_conexion.php');
            $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE ID_registrado = ?');
            $pagado = 1;
            $stmt->bind_param('ii', $pagado, $id_pago);
            $stmt->execute();
            $stmt->close();
            $conn->close();

        } else{
            echo "<div class='resultado error'>";
            echo "El pago no se realizó";
            echo "</div>";
        }
    ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>