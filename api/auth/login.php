<?php
    include_once '../../config/Database.php';
    include_once '../../models/user.php';

    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["password"]);

    session_start();
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    $user->email = $email;
    $user->pass = $pass;
    $result = $user->login()->fetch(PDO::FETCH_ASSOC);
    if(!empty($result)){
        $_SESSION['user'] = $result; 
        header('Location: http://localhost:8080/webfas/views/index.php');
        exit;
    }else{
        $_SESSION['pesan'] = "Email dan password salah!";
        header('Location: http://localhost:8080/webfas/views/login.php');
        exit;
    }

?>