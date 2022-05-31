<?php

$json = file_get_contents('php://input');
$data = json_decode($json);

$userName = $data->userName;
$password = $data->password;

$sql = 'SELECT id_user, name FROM users WHERE user_name = ? AND password = ?;';

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=sorveteria';
$connection = new PDO($dsn, 'root', '12345');
$prepared = $connection->prepare($sql);
$prepared->bindValue(1, $userName);
$prepared->bindValue(2, $password);

$prepared->execute();

$response = $prepared->fetch(PDO::FETCH_ASSOC);
if ($response == null) {
    echo json_encode(null);
    return;
}
$idUser = (int)$response['id_user'];
$name = $response['name'];

$request['idUser'] = $idUser;
$request['name'] = $name;

echo json_encode($request);

?>