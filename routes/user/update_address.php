<?php

require '../../database/connection.php';
require '../../dao/dao_user.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idUser = $data->id_user;
$address = $data->address;

$dao = new DAOUser();
$result = $dao->updateAddress($idUser, $address);

echo json_encode($result);
?>