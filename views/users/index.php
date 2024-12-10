<?php

include_once '../../config/Database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$result = $user->getUsers();
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
            <div class="row justify-content-end">
                <div class="col-3 text-end">
                    <a href="http://localhost:8080/webfas/views/users/create.php"
                        class="btn btn-sm btn-success">Add Data</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result->fetchAll() as $key => $item) { ?>
                        <tr>
                            <td><?php echo $item['username']; ?></td>
                            <td><?= $item['email']; ?></td>
                            <td><?= $item['role']; ?></td>
                            <td><?= $item['created_at']; ?></td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="http://localhost:8080/webfas/api/users/delete.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?= $item['id']; ?>">
                                    <a href="http://localhost:8080/webfas/views/users/edit.php?id=<?= $item['id']; ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <button type="submit"
                                        class="btn btn-sm btn-danger">
                                        Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>