<?php

include_once '../../config/Database.php';
include_once '../../models/facility.php';  // Ganti dengan model Facilities
include_once '../../models/category.php'; 
// Membuat koneksi database
$database = new Database();
$db = $database->getConnection();

// Ambil ID fasilitas dari parameter GET
$facilityId = htmlspecialchars($_GET["id"]);

// Inisialisasi objek Facility
$facility = new Facility($db);

// Set ID fasilitas yang akan diambil
$facility->id = $facilityId;

// Ambil data fasilitas berdasarkan ID
$result = $facility->getSingle();
$facilityData = $result->fetch(PDO::FETCH_ASSOC);

$category = new Category($db); // Buat objek kategori
$categories = $category->getCategories(); // Mengambil semua kategori

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fasilitas | SIMAFAS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once('../layout/navigation.php');
        ?>

        <div class="container mt-4">
            <div class="register-form">
                <h2 class="text-center mb-4">Edit Fasilitas</h2>
                <form method="POST" action="http://localhost:8080/webfas/api/facilities/update.php">
                    <div class="mb-3">
                        <label for="categoryId" class="form-label">Kategori</label>
                        <select class="form-control" id="categoryId" name="categoryId" required>
                            <option value="">Pilih Kategori</option>
                            <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $row['id']; ?>" <?= ($row['id'] == $facilityData['categoryId']) ? 'selected' : ''; ?>><?= $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama fasilitas" 
                        value="<?= $facilityData['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi fasilitas" required><?= $facilityData['description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="active" <?= ($facilityData['status'] == 'active') ? 'selected' : ''; ?>>Aktif</option>
                            <option value="inactive" <?= ($facilityData['status'] == 'inactive') ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>

                    <input type="hidden" id="id" name="id" value="<?= $facilityData['id']; ?>">

                    <a href="http://localhost:8080/webfas/views/facilities/" class="btn btn-danger btn-block">BATAL</a>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
