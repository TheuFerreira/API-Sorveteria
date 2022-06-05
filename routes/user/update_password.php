<?php

require '../../database/connection.php';
require '../../dao/dao_user.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idUser = $data->id_user;
$password = $data->password;

$dao = new DAOUser();
$result = $dao->updatePassword($idUser, $password);

echo json_encode($result);
?>