<?php

    class Database {

        private $host = "localhost";
        private $db_name = "n580414_ytdc-db";
        private $username = "n580414";
        private $password = "OUj10-A5;Q3ufc";
        private $conn;

        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host='. $this->host . ';dbname='. $this->db_name . ';',
                $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                echo "Error connecting to database" . $e->getMessage();
            }
            return $this->conn;
        }

    }
    
?>