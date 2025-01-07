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
    $id = htmlspecialchars($_POST["id"]);

    // Membuat koneksi database
    $database = new Database();
    $db = $database->getConnection();

    // Inisialisasi objek Booking
    $booking = new Booking($db);

    // Set data booking
    $booking->userId = $userId;
    $booking->facilityId = $facilityId;
    $booking->booking_date = $booking_date;
    $booking->start_time = $start_time;
    $booking->end_time = $end_time;
    $booking->status = $status;
    $booking->id = $id;

    // Update booking
    if ($booking->update()) {
        // Redirect ke halaman booking setelah update
        header('Location: http://localhost:8080/webfas/views/bookings/');
        exit;
    } else {
        // Jika gagal update, beri notifikasi error
        header('Location: http://localhost:8080/webfas/views/bookings/edit.php?id=' . $id . '&error=true');
        exit;
    }
?>
