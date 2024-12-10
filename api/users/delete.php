<?php
    include_once '../../config/Database.php';
    include_once '../../models/user.php';

    $id = htmlspecialchars($_POST["id"]);

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    $user->id = $id;
    $user->delete();
    
    header('Location: http://localhost:8080/webfas/views/users/');
    exit;
?>  