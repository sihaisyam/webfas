<?php

include_once '../../config/Database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->id = htmlspecialchars($_GET["id"]);
$result = $user->getSingle();
$user = $result->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | SIMAFAS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once('../layout/navigation.php')
        ?>

        <div class="container mt-4">
            <div class="register-form">
                <h2 class="text-center mb-4">Edit User</h2>
                <form method="POST" action="http://localhost:8080/webfas/api/users/update.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan nama lengkap" 
                        value="<?= $user['username']; ?>">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id']; ?>">
                        <input type="hidden" class="form-control" id="role" name="role" value="<?= $user['role']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="<?= $user['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" value="<?= $user['password']; ?>">
                    </div>
                    <a href="http://localhost:8080/webfas/views/users/" class="btn btn-danger btn-block">BATAL</a>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>