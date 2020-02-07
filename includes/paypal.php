<?php

require 'sdk/autoload.php';

define ('URL_SITIO', 'http://localhost/yo-gdlwebcam');

// Instalamos el SDK
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ATfwYIhqaZT33fqTANTm1PdMl2Fb0XjRuKKiYv7oNZXudcHOemUwIYGWlWy6yKm1fYsXQfKOR30vkmjM', // ClienteID
        'EG6HRM_88YdQ2RkvxxSZ-9YsF-ENCiUsd14BP3pwC0an8Vf5dxX2iEsHbcDCW0GfDq1UY7XukP47JtE_' // Secret        
    )
);

var_dump($apiContext);

?>