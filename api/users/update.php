<?php
    include_once '../../config/Database.php';
    include_once '../../models/user.php';

    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["password"]);
    $role = htmlspecialchars($_POST["role"]);
    $id = htmlspecialchars($_POST["id"]);

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    $user->username = $username;
    $user->email = $email;
    $user->pass = $pass;
    $user->role = $role;
    $user->id = $id;
    $user->update();
    
    header('Location: http://localhost:8080/webfas/views/users/');
    exit;
?>  