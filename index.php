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

// Mengambil data dari form
$jumlahAyam = $_POST['jumlah_ayam'];
$hargaAyam = $_POST['harga_ayam'];
$totalAyam= $_POST['total_ayam'];
$jumlahTulang = $_POST['jumlah_tulang'];
$hargaTulang = $_POST['harga_tulang'];
$totalTulang = $_POST['total_tulang'];
$grandTotal = $_POST['grand_total'];


// Menyimpan data ke dalam database
$sql = "INSERT INTO hitung (jumlah_kiloan, harga_ayam, total_ayam, tulang, harga_tulang, total_tulang, grand_total) 
        VALUES ($kiloAyam, $hargaAyam, $totalAyam, $jumlahTulang, $hargaTulang, $totalTulang, $grandTotal)";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chicken lator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="main_judul">
    <h1>Chicken Lator</h1>

</div>

<div class="data">
    
    <div class="tanggal">
        <p>
            Tanggal:  <?php echo date("d-m-y"); ?>
        </p>
       
    </div>

<div class="table_responsive" style="width: 50%, padding: 20px;">
    <table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tanggal</th>

      <th scope="col">Jumlah Kiloan Ayam</th>
      <th scope="col">Jumlah Kiloan Tulang</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry the Bird</td>
      <td>cek</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
</div>    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


