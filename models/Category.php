<?php

class Category{
    // Columns
    public $id;
    public $name;
    public $description;
    public $status;
    public $created_at;
    
    // Connection
    private $conn;
    // Table
    private $db_table = "categories";
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    // GET ALL
    public function getCategories(){
        $sqlQuery = "SELECT * FROM ". $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>