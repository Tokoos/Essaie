<?php
    class etudiant{
        // Connection
        private $conn;
        // Table
        private $db_table = "etudiant";
        // Columns
        public $id;
        public $nom;
        public $email;
        public $telephone;
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getEtudiant(){
            $sqlQuery = "SELECT id, nom, email, telephone FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // READ single
        public function getSingleEmployee(){
            $sqlQuery = "SELECT
                        id, 
                        nom, 
                        email, 
                        telephone, 
                        
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nom = $dataRow['name'];
            $this->email = $dataRow['email'];
            $this->telephone = $dataRow['telephone'];
            
        } 
        // CREATE
        public function createEtudiant(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nom = :nom, 
                        email = :email, 
                        telephone = :telephone";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nom=htmlspecialchars(strip_tags($this->nom));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->telephone=htmlspecialchars(strip_tags($this->telephone));
        
        
            // bind data
            $stmt->bindParam(":nom", $this->nom);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":telephone", $this->telephone);
            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        function deleteEtudiant(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
    ?>