<?php

class DAOCategory {
    public function getAllCategories() : array {
        $sql = 'SELECT id_category, description, path FROM category ORDER BY description;';
        $connection = new Connection();
        $psd = $connection->prepareSQL($sql);
        
        $psd->execute();
        $rows = $psd->fetchAll(PDO::FETCH_BOTH);
        
        $results = array();
        for ($i = 0; $i < count($rows); $i++) {
            $row = $rows[$i];
            $path = '../../img/category/' . $row['path'];
        
            $result['id_category'] = $row['id_category'];
            $result['description'] = $row['description'];
            $result['img'] = null;
        
            if (file_exists($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        
                $result['img'] = $base64;
            }
        
            array_push($results, $result);
        }

        return $results;
    }
}

?>