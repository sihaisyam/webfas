<?php
session_start();
if (!isset($_SESSION['user'])) {
    return header('Location: http://localhost:8080/webfas/views/login.php' );
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once('./layout/navigation.php')
        ?>
        <?php
        if (isset($_SESSION['user'])) {
            echo "Hai, ". $_SESSION['user']['username'];
        }
        ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Pengguna</h5>
                            <p class="card-text">1234</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Fasilitas</h5>
                            <p class="card-text">1234</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Booking</h5>
                            <p class="card-text">1234</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <script>
            // Data untuk chart (contoh)
            const labels = ['Januari', 'Februari', 'Maret'];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengguna Baru',
                    data: [12, 19, 3],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            };

            // Konfigurasi chart
            const config = {
                type: 'line',
                data: data,
                options: {}
            };

            // Membuat chart
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    </div>
</body>

</html>