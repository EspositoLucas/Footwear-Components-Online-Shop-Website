<?php
require_once "config/conexion.php";
// require "carrito.php";
// require __DIR__ .  '/vendor/autoload.php';

// MercadoPago\SDK::setAccessToken(TOKEN_MP);

// $preference = new MercadoPago\Preference();
// $productos_mp = array();

if (isset($_POST)) {
    if ($_POST['action'] == 'buscar') {
        $array['datos'] = array();
        $total = 0;
        for ($i=0; $i < count($_POST['data']); $i++) { 
            $id = $_POST['data'][$i]['id'];
            $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
            $result = mysqli_fetch_assoc($query);
            $data['id'] = $result['id'];
            $data['precio'] = $result['precio_rebajado'];
            $data['nombre'] = $result['nombre'];
            $total = $total + $result['precio_rebajado'];
            array_push($array['datos'], $data);
            unset($data);

            // $item = new MercadoPago\Item();
            // $item->id = $data['id'];
            // $item->title = $data['nombre'];
            // $item->price = $data['precio'];
            // // $item->total =  $item->total + $result['precio_rebajado'];
            // $item->currency_id = "ARS";
            // array_push($array['datos'], $data);
            // array_push($productos_mp,$item);
            // unset($data);
            // unset($item);
            
            //array_push($productos_mp,$item);
            //unset($item);

            // $data['id'] = $result['id'];
            // $data['precio'] = $result['precio_rebajado'];
            // $data['nombre'] = $result['nombre'];
            // $total = $total + $result['precio_rebajado'];
            // array_push($array['datos'], $data);
        }
        $array['total'] = $total;
        echo json_encode($array);
        die();
    }
}

?>