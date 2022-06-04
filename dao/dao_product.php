<?php

class DAOProduct {
    public function getAll(string $search) {
        $sql = '
            SELECT id_product, title, price, path 
            FROM product 
            WHERE title LIKE "%' . $search . '%"
                AND status = 1
            ORDER BY title
            LIMIT 10;';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        $psd->execute();

        $result = $psd->fetchAll(PDO::FETCH_BOTH);
        return $result;
    }
}

?>