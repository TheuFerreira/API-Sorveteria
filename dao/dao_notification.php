<?php

class DAONotification {
    public function getByUser(int $idUser) {
        $sql = '
            SELECT n.id_notification, n.id_notification_type, n.date, nt.description
            FROM notification AS n
            INNER JOIN notification_type AS nt ON n.id_notification_type = nt.id_notification_type
            LEFT JOIN sale AS s ON n.id_sale = s.id_sale
            WHERE s.id_user = ?
            ORDER BY n.id_notification DESC;
        ';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        $psd->bindValue(1, $idUser);
        $psd->execute();
        $result = $psd->fetchAll(PDO::FETCH_BOTH);
        
        return $result;
    }

    public function insert(int $idSale, int $idNotificationType, $date) {
        $sql = '
            INSERT INTO notification (id_sale, id_notification_type, date)
            VALUES (?, ?, ?);
        ';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        $psd->bindValue(1, $idSale);
        $psd->bindValue(2, $idNotificationType);
        $psd->bindValue(3, $date);
        $result = $psd->execute();
        
        return $result;
    }
}

?>