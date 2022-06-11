<?php

class DAOSaleProduct {
    public function insert($idSale, $idProduct, $price, $quantity) {
        $sql = '
            INSERT INTO sale_product (id_sale, id_product, price, quantity)
            VALUES (?, ?, ?, ?);
        ';

        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        $psd->bindValue(1, $idSale);
        $psd->bindValue(2, $idProduct);
        $psd->bindValue(3, $price);
        $psd->bindValue(4, $quantity);
        $result = $psd->execute();
        return $result;
    }
}

?>