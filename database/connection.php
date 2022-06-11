<?php

class Connection {

    public function getConnection() : PDO {
        $file = file_get_contents('../../settings.json');
        $json = json_decode($file);
        $dsn = 'mysql:host=' . $json->host . ';port=' . $json->port . ';dbname=' . $json->dbname;
        $connection = new PDO($dsn, $json->username, $json->password); 

        return $connection;
    }

    public function prepareSQL(string $sql) : PDOStatement {
        $connection = $this->getConnection();
        $prepared = $connection->prepare($sql);

        return $prepared;
    }

}

?>