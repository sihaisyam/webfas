<?php
    include_once '../../config/Database.php';
    include_once '../../models/booking.php'; // Ganti Facility dengan Booking

    // Ambil data dari form
    $userId = htmlspecialchars($_POST["userId"]);
    $facilityId = htmlspecialchars($_POST["facilityId"]);
    $booking_date = htmlspecialchars($_POST["booking_date"]);
    $start_time = htmlspecialchars($_POST["start_time"]);
    $end_time = htmlspecialchars($_POST["end_time"]);
    $status = htmlspecialchars($_POST["status"]);
    $created_at = htmlspecialchars($_POST["created_at"]);

    // Membuat koneksi database
    $database = new Database();
    $db = $database->getConnection();

    // Inisialisasi objek Booking
    $booking = new Booking($db);

    // Menetapkan nilai properti pada objek booking
    $booking->userId = $userId;
    $booking->facilityId = $facilityId;
    $booking->booking_date = $booking_date;
    $booking->start_time = $start_time;
    $booking->end_time = $end_time;
    $booking->status = $status;
    $booking->created_at = $created_at;

    // Menyimpan data booking baru ke database
    if ($booking->create()) {
        // Redirect ke halaman daftar booking setelah sukses
        header('Location: http://localhost:8080/webfas/views/bookings/');
        exit;
    } else {
        // Jika terjadi error, redirect ke halaman dengan error message
        header('Location: http://localhost:8080/webfas/views/bookings/create.php?error=true');
        exit;
    }
?>
