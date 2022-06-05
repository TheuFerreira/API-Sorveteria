<?php

class DAOUser {

    public function login($userName, $password) {
        $sql = 'SELECT id_user, name, address FROM users WHERE BINARY user_name = ? AND BINARY password = ?;';

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
        $address = $response['address'];
        
        $request['idUser'] = $idUser;
        $request['name'] = $name;
        $request['address'] = $address;

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

    public function updateName(int $idUser, string $name): bool {
        $sql = 'UPDATE users SET name = ? WHERE id_user = ?;';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);

        $psd->bindValue(1, $name);
        $psd->bindValue(2, $idUser);
        $result = $psd->execute();

        return $result;
    }

    public function updateUsername(int $idUser, string $userName): bool {
        $sql = 'UPDATE users SET user_name = ? WHERE id_user = ?;';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);

        $psd->bindValue(1, $userName);
        $psd->bindValue(2, $idUser);
        $result = $psd->execute();

        return $result;
    }

    public function updateAddress(int $idUser, string $address): bool {
        $sql = 'UPDATE users SET address = ? WHERE id_user = ?;';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);

        $psd->bindValue(1, $address);
        $psd->bindValue(2, $idUser);
        $result = $psd->execute();

        return $result;
    }

    public function updateCellphone(int $idUser, string $cellphone): bool {
        $sql = 'UPDATE users SET cellphone = ? WHERE id_user = ?;';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);

        $psd->bindValue(1, $cellphone);
        $psd->bindValue(2, $idUser);
        $result = $psd->execute();

        return $result;
    }

    public function updatePassword(int $idUser, string $password): bool {
        $sql = 'UPDATE users SET password = ? WHERE id_user = ?;';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);

        $psd->bindValue(1, $password);
        $psd->bindValue(2, $idUser);
        $result = $psd->execute();

        return $result;
    }

}

?>