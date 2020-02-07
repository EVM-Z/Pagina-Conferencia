<?php

require 'sdk/autoload.php';

define ('URL_SITIO', 'http://localhost/yo-gdlwebcam');

// Instalamos el SDK
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AfS0V-pSQxvHX1TV27xeOqTQFkU-lBcxMCWZnWvs_LPOHnTSeycYw_LiVcYj0trVhYyjM7LJXVOXM07c', // ClienteID
        'EJpFjh2v4Ku1sV-JL-kjXHDMHRUBBYSW4M47Uf1Wri6iboonHaxIyF7HtrugwHfdv6lbt3P2FxFPJiRm' // Secret        
    )
);

var_dump($apiContext);

?>