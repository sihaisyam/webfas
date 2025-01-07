<?php
    include_once '../../config/Database.php';
    include_once '../../models/facility.php'; // Ganti User dengan Facility

    // Ambil ID fasilitas yang akan dihapus
    $id = htmlspecialchars($_POST["id"]);

    // Membuat koneksi database
    $database = new Database();
    $db = $database->getConnection();

    // Inisialisasi objek Facility
    $facility = new Facility($db);

    // Set ID fasilitas yang akan dihapus
    $facility->id = $id;

    // Hapus fasilitas berdasarkan ID
    $facility->delete();

    // Redirect setelah fasilitas dihapus
    header('Location: http://localhost:8080/webfas/views/facilities/');
    exit;
?>
