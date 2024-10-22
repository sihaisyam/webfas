<?php

class Customer{
    // // Columns
    // public $id;
    // public $username;
    // public $email;
    // public $pass;
    // public $roles;
    // public $created;
    
    // Connection
    private $conn;
    // Table
    private $db_table = "customers";
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    // GET ALL
    public function getCustomers(){
        $sqlQuery = "SELECT * FROM ". $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>