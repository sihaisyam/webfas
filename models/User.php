<?php

class User{
    // // Columns
    public $id;
    public $username;
    public $email;
    public $pass;
    public $role;
    public $created_at;
    
    // Connection
    private $conn;
    // Table
    private $db_table = "users";
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    // GET ALL
    public function getUsers(){
        $sqlQuery = "SELECT * FROM ". $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>