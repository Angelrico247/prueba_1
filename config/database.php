<?php 

class Database {
    private $host = 'localhost';
    private $db = 'prueba_1';
    private $user = 'root';
    private $pd = '';

    public function getConnection(){
        $hostdb = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';

        try {
            $connection = new PDO($hostdb,$this->user, $this->pd);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            die('Error: ' . $e->getMessage());
        }


    }


}

?>