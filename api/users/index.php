<?php

include_once '../../config/Database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$result = $user->getUsers();
var_dump($result->fetch(PDO::FETCH_ASSOC));
die;
?>