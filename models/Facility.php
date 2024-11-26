<?php

class Facility{
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
    private $db_table = "facilities";
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    // GET ALL
    public function getFacilities(){
        $sqlQuery = "SELECT * FROM ". $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>