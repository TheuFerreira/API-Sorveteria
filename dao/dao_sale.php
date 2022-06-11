<?php

class DAOSale {
    public function insert($idUser, $date) {
        $sql = '
        INSERT INTO sale (id_user, date) VALUES (?, ?);
        ';

        $connection = new Connection();
        $conn = $connection->getConnection();
        $psd = $conn->prepare($sql);
        $psd->bindValue(1, $idUser);
        $psd->bindValue(2, $date);
        $psd->execute();

        $id = $conn->lastInsertId();
        return $id;
    }
}

?>