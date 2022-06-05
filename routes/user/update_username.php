<?php

require '../../database/connection.php';
require '../../dao/dao_user.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idUser = $data->id_user;
$username = $data->user_name;

$dao = new DAOUser();
$result = $dao->updateUsername($idUser, $username);

echo json_encode($result);
?>