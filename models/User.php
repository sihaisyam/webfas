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

    public function registration(){
        $sqlQuery = "INSERT INTO ". $this->db_table . " (username, email, password)
                    VALUES ('". $this->username . "', '". $this->email . "', 
                    '". $this->pass . "');";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function login(){
        $sqlQuery = "SELECT * FROM ". $this->db_table . 
                    " WHERE email ='". $this->email . "' AND
                    password = '". $this->pass . "';";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>