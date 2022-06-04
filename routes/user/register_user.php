<?php

require '../../database/connection.php';
require '../../dao/dao_user.php';

$json = file_get_contents('php://input');
$data = json_decode($json);
$name = $data->name;
$userName = $data->user_name;
$address = $data->address;
$cellphone = $data->cellphone;
$password = $data->password;

$dao = new DAOUser();
$exists = $dao->userExists($userName);

if ($exists == false) {
    $success = $dao->register($name, $userName, $address, $cellphone, $password);

    $response['success'] = $success;
    $response['message'] = '';
} else {
    $response['success'] = false;
    $response['message'] = 'Nome de usuário já existe';
}

echo json_encode($response);

?>