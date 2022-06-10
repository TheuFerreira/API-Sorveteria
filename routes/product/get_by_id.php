<?php

require '../../database/connection.php';
require '../../dao/dao_product.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idProduct = $data->id_product;

$dao = new DAOProduct();
$row = $dao->getById($idProduct,);

$response['idProduct'] = $row['id_product'];
$response['title'] = $row['title'];
$response['price'] = (float)$row['price'];
$response['description'] = $row['description'];

$path = '../../img/product/' . $row['path'];
if (file_exists($path)) {
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $response['img'] = $base64;
}

echo json_encode($response);

?>