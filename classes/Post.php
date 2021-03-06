<?php 
    
    // ini_set("include_path", '/home/n580414/php:' . ini_get("include_path") );

    class Post {
        private $conn;
        private $table = 'survey';

        public $phone;
        public $full_name;
        public $created_at;

        public function __construct($db) {
            $this->conn = $db;
        }
    
        public function read() {
            $query = 'SELECT DISTINCT Phone as phone,Full_Name as full_name FROM ' . $this->table;
        
            $stmt = $this->conn->prepare($query);
    
            $stmt->execute();
            return $stmt;
        }
    
        public function readSingle($id) {
            $query = 'SELECT DISTINCT * FROM ' . $this->table . ' WHERE PHONE = ? LIMIT 1';
    
    
        
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
    
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->phone = $row['phone'];
            $this->full_name = $row['full_name'];
        }
    
        public function create() {
            $query = 'INSERT INTO ' . $this->table . ' ( phone, full_name ) VALUES ( ?, ?)';
        
            
            $this->phone = htmlspecialchars(filter_var(strip_tags($this->phone), FILTER_SANITIZE_STRING));
            $this->full_name = htmlspecialchars(filter_var(strip_tags($this->full_name), FILTER_SANITIZE_STRING));
            if($this->full_name && $this->phone){
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1, $this->phone);
                $stmt->bindParam(2, $this->full_name);
    
                if($stmt->execute()){
                    return true;
                }    
            }
            
            // printf("Error: %s .\n", $stmt->error_log());
            return false;
    
        }

        public function deleteAll() {
            $query = 'DELETE FROM  ' . $this->table; 
            $stmt = $this->conn->prepare($query);
            if($stmt->execute()){
                return true;
            }  
            // printf("Error: %s .\n", $stmt->error_log());
            return false;
    
        }

        public function delete() {

            $query = 'DELETE FROM ' . $this->table . ' WHERE phone = ? AND full_name = ?';

            $this->phone = htmlspecialchars(filter_var(strip_tags($this->phone), FILTER_SANITIZE_STRING));
            $this->full_name = htmlspecialchars(filter_var(strip_tags($this->full_name), FILTER_SANITIZE_STRING));
            if($this->full_name && $this->phone){
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1, $this->phone);
                $stmt->bindParam(2, $this->full_name);
    
                if($stmt->execute()){
                    return true;
                }    
            }
            
            return false;
    
        }
    }

    
?>