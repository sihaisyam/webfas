<?php
    include_once '../../config/Database.php';
    include_once '../../models/booking.php'; // Ganti Facility dengan Booking

    // Ambil ID booking yang akan dihapus
    $id = htmlspecialchars($_POST["id"]);

    // Membuat koneksi database
    $database = new Database();
    $db = $database->getConnection();

    // Inisialisasi objek Booking
    $booking = new Booking($db);

    // Set ID booking yang akan dihapus
    $booking->id = $id;

    // Hapus booking berdasarkan ID
    $booking->delete();

    // Redirect setelah booking dihapus
    header('Location: http://localhost:8080/webfas/views/bookings/');
    exit;
?>
