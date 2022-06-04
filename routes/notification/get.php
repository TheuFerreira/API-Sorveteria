<?php

require '../../database/connection.php';
require '../../dao/dao_notification.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$idUser = $data->id_user;

$dao = new DAONotification();
$result = $dao->getByUser($idUser);

$responses = array();
for ($i = 0; $i < count($result); $i++) {
    $row = $result[$i];

    $response['id_notification'] = $row['id_notification'];
    $response['id_notification_type'] = $row['id_notification_type'];
    $response['date'] = $row['date'];
    $response['description'] = $row['description'];

    array_push($responses, $response);
}

echo json_encode($responses);
?>