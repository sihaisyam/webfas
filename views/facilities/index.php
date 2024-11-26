<?php

include_once '../../config/database.php';
include_once '../../models/facility.php';

$database = new Database();
$db = $database->getConnection();
$facility = new Facility($db);
$result = $facility->getFacilities();
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result->fetchAll() as $key => $item) { ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?= $item['description']; ?></td>
                            <td><?= $item['status']; ?></td>
                            <td><?= $item['created_at']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>