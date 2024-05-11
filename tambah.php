<?php

session_start();
// Koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda
$database = 'ayam_tes'; // Ganti dengan nama database Anda

$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Set nilai default untuk harga tulang
$harga_tulang = 11000;

// Memeriksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $tanggal = $_POST['tanggal'];
    $kiloan_ayam = $_POST['kiloan_ayam'];
    $harga_ayam = $_POST['harga_ayam'];
    $kiloan_tulang = $_POST['kiloan_tulang'];

    // Menghitung total ayam dan total tulang
    $total_ayam = $kiloan_ayam * $harga_ayam;
    $total_tulang = $kiloan_tulang * $harga_tulang;

    // Menghitung grand total
    $grand_total = $total_ayam - $total_tulang;

    // Simpan data ke dalam database
    $query = "INSERT INTO hitung (tanggal, kiloan_ayam, harga_ayam, total_ayam, kiloan_tulang, harga_tulang, total_tulang, grand_total)
              VALUES ('$tanggal', $kiloan_ayam, $harga_ayam, $total_ayam, $kiloan_tulang, $harga_tulang, $total_tulang, $grand_total)";


    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        // Set pesan sukses dalam session
        $_SESSION['success_message'] = 'Data berhasil ditambahkan!';
        // Redirect pengguna ke halaman tes.php
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    //Tutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE ht ml>
<html>

<head>
    <title>Tambah Data</title>
    <!-- Load Bo            otstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Tambah Data</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="kiloan_ayam">Kiloan Ayam:</label>
                <input type="number" class="form-control" name="kiloan_ayam" id="kiloan_ayam" required>
                </ div>
                <div class="form-group">
                    <label for="harga_ayam">Harga Ayam:</label>
                    <input type="number" class="form-control" name="harga_ayam" id="harga_ayam" required>
                </div>
                <div class="form-group">
                    <label for="kiloan_tulang">Kiloan Tulang:</label>
                    <input type="number" class="form-control" name="kiloan_tulang" id="kiloan_tulang" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>


</html>