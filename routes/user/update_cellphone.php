<?php

require '../../database/connection.php';
require '../../dao/dao_user.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idUser = $data->id_user;
$cellphone = $data->cellphone;

$dao = new DAOUser();
$result = $dao->updateCellphone($idUser, $cellphone);

echo json_encode($result);
?>