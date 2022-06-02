<?php

class DAOUser {

    public function login($userName, $password) {
        $sql = 'SELECT id_user, name FROM users WHERE user_name = ? AND password = ?;';

        $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=sorveteria';
        $connection = new PDO($dsn, 'root', '12345');
        $prepared = $connection->prepare($sql);
        $prepared->bindValue(1, $userName);
        $prepared->bindValue(2, $password);
        
        $prepared->execute();
        
        $response = $prepared->fetch(PDO::FETCH_ASSOC);
        if ($response == null) {
            return null;
        }

        $idUser = (int)$response['id_user'];
        $name = $response['name'];
        
        $request['idUser'] = $idUser;
        $request['name'] = $name;

        return $request;
    }

    public function register($name, $userName, $address, $cellphone, $password) {
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

        return $success;
    }

    public function userExists($userName) {
        $sql = 'SELECT COUNT(id_user) AS count FROM users WHERE user_name = ?;';
        $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=sorveteria';
        $connection = new PDO($dsn, 'root', '12345');
        $prepared = $connection->prepare($sql);
        $prepared->bindValue(1, $userName);
        $prepared->execute();

        $result = $prepared->fetch(PDO::FETCH_ASSOC);
        $count = (int)$result['count'];

        return $count > 0;
    }

}

?>