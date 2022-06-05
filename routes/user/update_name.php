<?php

require '../../database/connection.php';
require '../../dao/dao_user.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idUser = $data->id_user;
$name = $data->name;

$dao = new DAOUser();
$result = $dao->updateName($idUser, $name);

echo json_encode($result);
?>