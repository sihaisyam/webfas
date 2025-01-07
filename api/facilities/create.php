<?php
    include_once '../../config/Database.php';
    include_once '../../models/facility.php'; // Ganti User dengan Facility

    // Ambil data dari form
    $categoryId = htmlspecialchars($_POST["categoryId"]);
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $status = htmlspecialchars($_POST["status"]);
    $created_at = htmlspecialchars($_POST["created_at"]);

    // Membuat koneksi database
    $database = new Database();
    $db = $database->getConnection();

    // Inisialisasi objek Facility
    $facility = new Facility($db);

    // Menetapkan nilai properti pada objek facility
    $facility->categoryId = $categoryId;
    $facility->name = $name;
    $facility->description = $description;
    $facility->status = $status;
    $facility->created_at = $created_at;

    // Menyimpan data fasilitas baru ke database
    if ($facility->create()) {
        // Redirect ke halaman daftar fasilitas setelah sukses
        header('Location: http://localhost:8080/webfas/views/facilities/');
        exit;
    } else {
        // Jika terjadi error, redirect ke halaman dengan error message
        header('Location: http://localhost:8080/webfas/views/facilities/create.php?error=true');
        exit;
    }
?>
