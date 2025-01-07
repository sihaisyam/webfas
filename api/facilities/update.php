<?php
    include_once '../../config/Database.php';
    include_once '../../models/facility.php'; // Ganti User dengan Facility

    // Ambil data dari form
    $categoryId = htmlspecialchars($_POST["categoryId"]);
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $status = htmlspecialchars($_POST["status"]);
    $id = htmlspecialchars($_POST["id"]);

    // Membuat koneksi database
    $database = new Database();
    $db = $database->getConnection();

    // Inisialisasi objek Facility
    $facility = new Facility($db);

    // Set data fasilitas
    $facility->categoryId = $categoryId;
    $facility->name = $name;
    $facility->description = $description;
    $facility->status = $status;
    $facility->id = $id;

    // Update fasilitas
    $facility->update();

    // Redirect ke halaman fasilitas setelah update
    header('Location: http://localhost:8080/webfas/views/facilities/');
    exit;
?>
