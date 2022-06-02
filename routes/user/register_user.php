<?php

$json = file_get_contents('php://input');
$data = json_decode($json);

$name = $data->name;
$userName = $data->user_name;
$address = $data->address;
$cellphone = $data->cellphone;
$password = $data->password;

$sql = 'SELECT COUNT(id_user) AS count FROM users WHERE user_name = ?;';
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=sorveteria';
$connection = new PDO($dsn, 'root', '12345');
$prepared = $connection->prepare($sql);
$prepared->bindValue(1, $userName);
$prepared->execute();

$result = $prepared->fetch(PDO::FETCH_ASSOC);
$count = (int)$result['count'];

if ($count == 0) {
    $sql = 'INSERT INTO users (name, user_name, address, cellphone, password) VALUES (?, ?, ?, ?, ?);';

    $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=sorveteria';
    $connection = new PDO($dsn, 'root', '12345');
    $prepared = $connection->prepare($sql);
    $prepared->bindValue(1, $name);
    $prepared->bindValue(2, $userName);
    $prepared->bindValue(3, $address);
    $prepared->bindValue(4, $cellphone);
    $prepared->bindValue(5, $password);
    
    $success = $prepared->execute();
    
    $response['success'] = $success;
    $response['message'] = '';
} else {
    $response['success'] = false;
    $response['message'] = 'Nome de usuário já existe';
}

echo json_encode($response);

?>