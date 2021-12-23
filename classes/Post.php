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
            $query = 'SELECT * FROM ' . $this->table . ';';
        
            $stmt = $this->conn->prepare($query);
    
            $stmt->execute();
            return $stmt;
        }
    
        public function readSingle($id) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE PHONE = ? LIMIT 1';
    
    
        
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
    
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->phone = $row['phone'];
            $this->full_name = $row['full_name'];
        }
    
        public function create() {
            $query = 'INSERT INTO ' . $this->table . ' ( phone, full_name ) VALUES ( ?, ?)';
        
            
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->phone);
            $stmt->bindParam(2, $this->full_name);
    
            if($stmt->execute()){
                return true;
            }
            // printf("Error: %s .\n", $stmt->error_log());
            return false;
    
        }
        public function delete() {
            $query = 'DELETE FROM ' . $this->table . ' WHERE phone = ? AND full_name = ?';
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    
            $illegals = ['1',1,'*', ' ', '', null, 'null', 'TRUE', true, 'true', 'True'];
    
            if(in_array($this->phone, $illegals) OR in_array($this->full_name, $illegals)){
                echo "badd";
                return false;
            }
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->phone);
            $stmt->bindParam(2, $this->full_name);
    
            if($stmt->execute){
                return true;
            }
            return false;
    
        }
    }

    
?>