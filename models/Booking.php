<?php
class Booking {
    // Database connection and table name
    private $conn;
    private $db_table = "bookings";  // Nama tabel untuk bookings

    // Atribut booking
    public $id;
    public $userId;
    public $facilityId;
    public $booking_date;
    public $start_time;
    public $end_time;
    public $status;
    public $created_at;

    // Constructor untuk koneksi ke database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Fungsi untuk membuat (insert) booking baru
    public function create() {
        // Query untuk menambahkan booking baru
        $sqlQuery = "INSERT INTO " . $this->db_table . " (userId, facilityId, booking_date, start_time, end_time, status, created_at)
                     VALUES (:userId, :facilityId, :booking_date, :start_time, :end_time, :status, :created_at)";

        // Menyiapkan query
        $stmt = $this->conn->prepare($sqlQuery);

        // Binding parameter
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":facilityId", $this->facilityId);
        $stmt->bindParam(":booking_date", $this->booking_date);
        $stmt->bindParam(":start_time", $this->start_time);
        $stmt->bindParam(":end_time", $this->end_time);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_at", $this->created_at);

        // Eksekusi query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getAll() {
        // SQL query dengan JOIN untuk mendapatkan nama fasilitas dan nama pengguna
        $sqlQuery = "SELECT b.*, f.name AS facility_name, u.username AS user_name 
                     FROM " . $this->db_table . " b
                     LEFT JOIN facilities f ON b.facilityId = f.id
                     LEFT JOIN users u ON b.userId = u.id";
    
        // Menyiapkan query
        $stmt = $this->conn->prepare($sqlQuery);
    
        // Menjalankan query
        $stmt->execute();
    
        return $stmt;
    }
    

    // Fungsi untuk mendapatkan booking berdasarkan ID
    public function getSingle() {
        $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id = :id";

        // Menyiapkan query
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }

    // Fungsi untuk memperbarui data booking
    public function update() {
        // Query untuk memperbarui booking
        $sqlQuery = "UPDATE " . $this->db_table . " 
                     SET userId = :userId, 
                         facilityId = :facilityId, 
                         booking_date = :booking_date, 
                         start_time = :start_time, 
                         end_time = :end_time, 
                         status = :status, 
                         created_at = :created_at
                     WHERE id = :id";

        // Menyiapkan query
        $stmt = $this->conn->prepare($sqlQuery);

        // Binding parameter
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":facilityId", $this->facilityId);
        $stmt->bindParam(":booking_date", $this->booking_date);
        $stmt->bindParam(":start_time", $this->start_time);
        $stmt->bindParam(":end_time", $this->end_time);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":id", $this->id);

        // Eksekusi query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Fungsi untuk menghapus booking berdasarkan ID
    public function delete() {
        // Query untuk menghapus booking
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = :id";

        // Menyiapkan query
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $this->id);

        // Eksekusi query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getBookingCountByFacility($startDate, $endDate) {
        // SQL query untuk mendapatkan jumlah bookings per fasilitas dalam rentang tanggal tertentu
        $sqlQuery = "
            SELECT 
                facilityId, 
                COUNT(*) as booking_count 
            FROM 
                " . $this->db_table . " 
            WHERE 
                booking_date BETWEEN :start_date AND :end_date 
            GROUP BY 
                facilityId
            ORDER BY 
                booking_count DESC
        ";

        // Menyiapkan query
        $stmt = $this->conn->prepare($sqlQuery);

        // Bind parameters
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);

        // Eksekusi query
        $stmt->execute();

        return $stmt;
    }
}
?>
