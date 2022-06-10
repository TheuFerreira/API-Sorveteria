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

    public function getByCategory(int $idCategory, string $search) {
        $sql = '
            SELECT p.id_product, p.title, p.price, p.path 
            FROM product AS p
            INNER JOIN category_product AS cp ON p.id_product = cp.id_product
            WHERE p.title LIKE "%' . $search . '%"
                AND p.status = 1
                AND cp.id_category = ?
            ORDER BY p.title
            LIMIT 10;';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        $psd->bindValue(1, $idCategory);
        $psd->execute();

        $result = $psd->fetchAll(PDO::FETCH_BOTH);
        return $result;
    }

    public function getMostSelled(int $limit) {
        $sql = '
            SELECT p.id_product, p.title, p.price, p.path
            FROM sale_product AS sp
            INNER JOIN product AS p ON sp.id_product = p.id_product
            WHERE p.status = 1
            GROUP BY sp.id_product
            ORDER BY COUNT(sp.id_product) DESC
            LIMIT ' . $limit . ';';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        $psd->execute();

        $result = $psd->fetchAll(PDO::FETCH_BOTH);
        return $result;
    }

    public function getById(int $idProduct) {
        $sql = '
            SELECT id_product, title, description, price, path 
            FROM product
            WHERE id_product = ?;
        ';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        $psd->bindValue(1, $idProduct);
        $psd->execute();

        $result = $psd->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>