<?php

class Customer {
    // Columns
    public $id;
    public $userId;
    public $name;
    public $address;
    public $phone;
    public $created_at;
    
    // Connection
    private $conn;
    
    // Table
    private $db_table = "customers"; // Ganti nama tabel sesuai kebutuhan
    
    // Db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // GET ALL Customers
    public function getCustomers() {
        $sqlQuery = "SELECT * FROM ". $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE Customer
    public function create() {
        $sqlQuery = "INSERT INTO ". $this->db_table . " (userId, name, address, phone, created_at)
                     VALUES (:userId, :name, :address, :phone, :created_at)";
        $stmt = $this->conn->prepare($sqlQuery);

        // Bind data
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":created_at", $this->created_at);

        $stmt->execute();
        return $stmt;
    }

    // GET Single Customer
    public function getSingle() {
        $sqlQuery = "SELECT * FROM ". $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    // UPDATE Customer
    public function update() {
        $sqlQuery = "UPDATE ". $this->db_table ."
                    SET 
                        userId = :userId,
                        name = :name,
                        address = :address,
                        phone = :phone,
                        created_at = :created_at
                    WHERE 
                        id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        
        // Bind data
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":id", $this->id);
        
        $stmt->execute();
        return $stmt;
    }

    // DELETE Customer
    public function delete() {
        $sqlQuery = "DELETE FROM ". $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
}
?>
