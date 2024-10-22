<?php
//input
$sisi = $_GET['sisi'] ?? 0;
//proses
$luasPersegi = $sisi * $sisi; //25
//output
echo "Luas persegi adalah " . $luasPersegi;
//rumus konversi c ke r R = 4/5 * C
//input
$celsius = $_GET['celcius'] ?? 0;
//proses
$reamur = 4 / 5 * $celsius;
//output
echo "Hasil konversi dari celcius ke reamur adalah " . $reamur;
//http://localhost:8080/webfas/views/proses.php?sisi=5&celcius=20

// bpjs = jika gaji > umr maka bpjs 150000
// bpjs = jika kurang dari sama dengan umr maka 2.5%
// 0 = 2x > c
// 0 = 2x <= c
