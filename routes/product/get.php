<?php

require '../../database/connection.php';
require '../../dao/dao_product.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$search = $data->search;

$dao = new DAOProduct();
$rows = $dao->getAll($search);

$responses = array();
for ($i = 0; $i < count($rows); $i++) {
    $row = $rows[$i];

    $response['idProduct'] = $row['id_product'];
    $response['title'] = $row['title'];
    $response['price'] = (float)$row['price'];

    $path = '../../img/product/' . $row['path'];
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $response['img'] = $base64;
    }

    array_push($responses, $response);
}

echo json_encode($responses);

?>