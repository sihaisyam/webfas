<?php

include_once '../../config/Database.php';
include_once '../../models/booking.php';  // Ganti dengan model Booking
include_once '../../models/facility.php'; // Ganti dengan model Facility untuk mengambil data fasilitas
include_once '../../models/user.php'; // Ganti dengan model User untuk mengambil data pengguna

// Membuat koneksi database
$database = new Database();
$db = $database->getConnection();

// Ambil ID booking dari parameter GET
$bookingId = htmlspecialchars($_GET["id"]);

// Inisialisasi objek Booking
$booking = new Booking($db);

// Set ID booking yang akan diambil
$booking->id = $bookingId;

// Ambil data booking berdasarkan ID
$result = $booking->getSingle();
$bookingData = $result->fetch(PDO::FETCH_ASSOC);

// Inisialisasi objek Facility dan User untuk mendapatkan data fasilitas dan pengguna
$facility = new Facility($db);
$facilities = $facility->getFacilities(); // Mengambil semua fasilitas

$user = new User($db);
$users = $user->getUsers(); // Mengambil semua pengguna

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking | SIMAFAS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once('../layout/navigation.php');
        ?>

        <div class="container mt-4">
            <div class="register-form">
                <h2 class="text-center mb-4">Edit Booking</h2>
                <form method="POST" action="http://localhost:8080/webfas/api/bookings/update.php"> <!-- Ubah URL API -->
                    <div class="mb-3">
                        <label for="userId" class="form-label">Pengguna</label>
                        <select class="form-control" id="userId" name="userId" required>
                            <option value="">Pilih Pengguna</option>
                            <?php while ($row = $users->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $row['id']; ?>" <?= ($row['id'] == $bookingData['userId']) ? 'selected' : ''; ?>><?= $row['username']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="facilityId" class="form-label">Fasilitas</label>
                        <select class="form-control" id="facilityId" name="facilityId" required>
                            <option value="">Pilih Fasilitas</option>
                            <?php while ($row = $facilities->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $row['id']; ?>" <?= ($row['id'] == $bookingData['facilityId']) ? 'selected' : ''; ?>><?= $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Tanggal Booking</label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date" value="<?= $bookingData['booking_date']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="start_time" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="<?= $bookingData['start_time']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_time" class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" value="<?= $bookingData['end_time']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="nego" <?= ($bookingData['status'] == 'nego') ? 'selected' : ''; ?>>Nego</option>
                            <option value="confirmed" <?= ($bookingData['status'] == 'confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="cancelled" <?= ($bookingData['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>

                    <input type="hidden" id="id" name="id" value="<?= $bookingData['id']; ?>">

                    <a href="http://localhost:8080/webfas/views/bookings/" class="btn btn-danger btn-block">BATAL</a>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
