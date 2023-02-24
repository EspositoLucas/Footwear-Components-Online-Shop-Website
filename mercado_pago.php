<?php

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-6151675729036855-022319-755f74a165d639586e1e9e125d3b694f-1089307718');


    $preference = new MercadoPago\Preference();

    $item = new MercadoPago\Item();
    $item->id = '0001';
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 150.00;
    $item->currency_id = "ARS";

    $preference->items = array($item);

    $preference->back_urls = array(
        "success" => "http://localhost/web/WebFondosTotys_Compra/card/captura.php",
        "failure" => "http://localhost/web/WebFondosTotys_Compra/card/fallo.php"
    );

    $preference->auto_return = "approved";
    $preference->binary_mode = true;

    $preference->save();    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Pago</title>
<script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>

<h4>Mercado Pago</h4>

<div class="cho-container"></div>
<!-- <button class="btn btn-warning" type="button" id="btnVaciar">Pagar con Mercado Pago</button> -->
<script>
                 const mp = new MercadoPago('TEST-d1670a25-72cd-4905-8ff3-59cd0ce3a19f', {
                            locale: 'es-AR'
                         });

                    mp.checkout({
                         preference: {
                         id: '<?php echo $preference->id; ?>'
                        },
                    render: {
                        container: '.cho-container',
                        label: 'Pagar con Mercado Pago',
                 }
             });
</script>

</body>
</html>