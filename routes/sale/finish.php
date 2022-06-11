<?php

require '../../database/connection.php';
require '../../dao/dao_sale.php';
require '../../dao/dao_sale_product.php';
require '../../dao/dao_notification.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idUser = $data->id_user;
$date = gmdate("Y-m-d H:i:s");
$products = $data->products;

$daoSale = new DAOSale();
$idSale = $daoSale->insert($idUser, $date);

$daoSaleProduct = new DAOSaleProduct();
for ($i = 0; $i < count($products); $i++) {
    $product = $products[$i];
    $idProduct = $product->id_product;
    $price = $product->price;
    $quantity = $product->quantity;
    $daoSaleProduct->insert($idSale, $idProduct, $price, $quantity);
}

$idNotificationType = 1;

$daoNotification = new DAONotification();
$daoNotification->insert($idSale, $idNotificationType, $date);

echo json_encode(true);

?>