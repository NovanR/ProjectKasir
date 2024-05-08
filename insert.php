<?php
// Konfigurasi koneksi ke database
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "ayam"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// // Mengambil data dari form
// $jumlahAyam = $_POST['jumlah_ayam'];
// $hargaAyam = $_POST['harga_ayam'];
// $totalAyam= $_POST['total_ayam'];
// $jumlahTulang = $_POST['jumlah_tulang'];
// $hargaTulang = $_POST['harga_tulang'];
// $totalTulang = $_POST['total_tulang'];
// $grandTotal = $_POST['grand_total'];


// // Menyimpan data ke dalam database
// $sql = "INSERT INTO hitung (jumlah_kiloan, harga_ayam, total_ayam, tulang, harga_tulang, total_tulang, grand_total) 
//         VALUES ($jumlahAyam, $hargaAyam, $totalAyam, $jumlahTulang, $hargaTulang, $totalTulang, $grandTotal)";

// if ($conn->query($sql) === TRUE) {
//     echo "Data berhasil disimpan.";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

//Menutup koneksi
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Input Data Ayam dan Tulang</title>
</head>
<body>
<h2>Form Input Data Ayam dan Tulang</h2>
<form action="input_data.php" method="POST">
    <label for="kiloAyam">Kiloan Ayam:</label>
    <input type="text" id="kiloAyam" name="kiloAyam"><br><br>
    
    <label for="hargaAyam">Harga Ayam:</label>
    <input type="text" id="hargaAyam" name="hargaAyam"><br><br>
    
    <label for="kiloTulang">Kiloan Tulang:</label>
    <input type="text" id="kiloTulang" name="kiloTulang"><br><br>
    
    <input type="submit" value="Submit">
</form>
</body>
</html>
