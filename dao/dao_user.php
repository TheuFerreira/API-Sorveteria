<?php

class DAOUser {

    public function login($userName, $password) {
        $sql = 'SELECT id_user, name FROM users WHERE user_name = ? AND password = ?;';

        $connection = new Connection();
        $prepared = $connection->prepareSQL($sql);
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

        $connection = new Connection();
        $prepared = $connection->prepareSQL($sql);
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
        
        $connection = new Connection();
        $prepared = $connection->prepareSQL($sql);
        $prepared->bindValue(1, $userName);
        $prepared->execute();

        $result = $prepared->fetch(PDO::FETCH_ASSOC);
        $count = (int)$result['count'];

        return $count > 0;
    }

}

?>