<?php

class Facility
{
    // Columns
    public $id;
    public $categoryId;
    public $name;
    public $description;
    public $status;
    public $created_at;

    // Connection
    private $conn;

    // Table
    private $db_table = "facilities"; // Ganti nama tabel sesuai kebutuhan

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL Facilities
    public function getFacilities()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE Facility
    public function create()
    {
        $sqlQuery = "INSERT INTO " . $this->db_table . " (categoryId, name, description, status, created_at)
                     VALUES (:categoryId, :name, :description, :status, :created_at)";
        $stmt = $this->conn->prepare($sqlQuery);

        // Bind data
        $stmt->bindParam(":categoryId", $this->categoryId);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_at", $this->created_at);

        $stmt->execute();
        return $stmt;
    }

    // GET Single Facility
    public function getSingle()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    // UPDATE Facility
    public function update()
    {
        $sqlQuery = "UPDATE " . $this->db_table . "
        SET 
            categoryId = :categoryId,
            name = :name,
            description = :description,
            status = :status,
            created_at = :created_at
        WHERE 
            id = :id";
        $stmt = $this->conn->prepare($sqlQuery);

        // Bind data
        $stmt->bindParam(":categoryId", $this->categoryId);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":id", $this->id);

        $stmt->execute();
        return $stmt;
    }

    // DELETE Facility
    public function delete()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
}
