<?php

require '../../database/connection.php';
require '../../dao/dao_user.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$userName = $data->user_name;
$password = $data->password;

$dao = new DAOUser();
$request = $dao->login($userName, $password);
if ($request == null) {
    $request['idUser'] = -1;
    $request['name'] = '';
    $request['address'] = '';
    $request['message'] = 'Usuário não encontrado';
} else {
    $request['message'] = '';
}

echo json_encode($request);

?>