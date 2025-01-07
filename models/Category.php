<?php

class Category {
    // Columns
    public $id;
    public $name;
    public $description;
    public $status;
    public $created_at;
    
    // Connection
    private $conn;
    
    // Table
    private $db_table = "categories"; // Ganti nama tabel sesuai kebutuhan
    
    // Db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // GET ALL Categories
    public function getCategories() {
        $sqlQuery = "SELECT * FROM ". $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE Category
    public function create() {
        $sqlQuery = "INSERT INTO ". $this->db_table . " (name, description, status, created_at)
                     VALUES (:name, :description, :status, :created_at)";
        $stmt = $this->conn->prepare($sqlQuery);

        // Bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_at", $this->created_at);

        $stmt->execute();
        return $stmt;
    }

    // GET Single Category
    public function getSingle() {
        $sqlQuery = "SELECT * FROM ". $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    // UPDATE Category
    public function update() {
        $sqlQuery = "UPDATE ". $this->db_table ."
                    SET 
                        name = :name,
                        description = :description,
                        status = :status,
                        created_at = :created_at
                    WHERE 
                        id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        
        // Bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":id", $this->id);
        
        $stmt->execute();
        return $stmt;
    }

    // DELETE Category
    public function delete() {
        $sqlQuery = "DELETE FROM ". $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
}
?>
