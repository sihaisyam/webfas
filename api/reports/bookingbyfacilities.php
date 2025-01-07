<?php
    // Include database dan model yang diperlukan
    include_once '../../config/Database.php';
    include_once '../../models/Booking.php';  // Model Booking yang memiliki fungsi bookingCountByFacility
    include_once '../../models/Facility.php';  // Model Facility untuk mendapatkan nama fasilitas

    // Ambil data tanggal dari form (start_date dan end_date)
    $startDate = htmlspecialchars($_POST["start_date"]);  // Contoh format: 2025-01-01
    $endDate = htmlspecialchars($_POST["end_date"]);  // Contoh format: 2025-01-31

    // Membuat koneksi ke database
    $database = new Database();
    $db = $database->getConnection();

    // Inisialisasi objek Booking
    $booking = new Booking($db);

    // Mengambil jumlah booking per fasilitas dalam rentang tanggal
    $stmt = $booking->getBookingCountByFacility($startDate, $endDate);

    // Inisialisasi objek Facility
    $facility = new Facility($db);

    // Menampilkan data laporan jumlah booking berdasarkan fasilitas
    if ($stmt->rowCount() > 0) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Fasilitas</th><th>Jumlah Booking</th></tr></thead>";
        echo "<tbody>";

        // Loop untuk mengambil data booking per fasilitas
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Ambil nama fasilitas berdasarkan facilityId
            $facilityId = $row['facilityId'];
            $facility->id = $facilityId;
            $facilityData = $facility->getSingle()->fetch(PDO::FETCH_ASSOC); // Mendapatkan data fasilitas berdasarkan id
            $facilityName = $facilityData['name'];  // Nama fasilitas

            echo "<tr>";
            echo "<td>".$facilityName."</td>";
            echo "<td>".$row['booking_count']."</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Tidak ada data booking untuk rentang tanggal tersebut.";
    }
?>
