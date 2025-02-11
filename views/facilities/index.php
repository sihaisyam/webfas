<?php 

include_once '../../config/Database.php';
include_once '../../models/facility.php'; // Ganti ke model Facilities

$database = new Database();
$db = $database->getConnection();
$facility = new Facility($db); // Ganti User dengan Facility
$result = $facility->getFacilities(); // Ganti getUsers menjadi getFacilities
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities | SIMAFAS</title>
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
                    <a href="http://localhost:8080/webfas/views/facilities/create.php" class="btn btn-sm btn-success">Add Data</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result->fetchAll() as $key => $item) { ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?= $item['description']; ?></td>
                            <td><?= $item['categoryId']; ?></td> <!-- Menampilkan categoryId atau nama kategori jika ada relasi -->
                            <td><?= $item['status']; ?></td>
                            <td><?= $item['created_at']; ?></td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="http://localhost:8080/webfas/api/facilities/delete.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?= $item['id']; ?>">
                                    <a href="http://localhost:8080/webfas/views/facilities/edit.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
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
