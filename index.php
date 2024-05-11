<?php
session_start();

// Check if success message is set
if (isset($_SESSION['success_message'])) {
    // Display the alert
    echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
    // Unset the session variable
    unset($_SESSION['success_message']);
}


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

// Set nilai default untuk bulan dan tahun
$selected_month = date('n');
$selected_year = date('Y');

// Proses jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil bulan dan tahun yang dipilih dari form
    $selected_month = $_POST['bulan'];
    $selected_year = $_POST['tahun'];
}

// Query untuk mengambil data berdasarkan bulan dan tahun yang dipilih
$query = "SELECT * FROM hitung WHERE MONTH(tanggal) = $selected_month AND YEAR(tanggal) = $selected_year";

// Eksekusi query
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Bulan dan Tahun</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-bordered.custom-border th,
        .table-bordered.custom-border td {
            border-color: blue !important;
        }
    </style>

</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Pilih Bulan dan Tahun</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="col-sm-3">
                    <select class="form-control" name="bulan">
                        <?php
                        // Menampilkan opsi bulan
                        $bulan_list = [
                            1 => 'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember'
                        ];
                        foreach ($bulan_list as $bulan_num => $bulan_name) {
                            $selected = ($bulan_num == $selected_month) ? 'selected' : '';
                            echo "<option value='$bulan_num' $selected>$bulan_name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="tahun">
                        <?php
                        // Menampilkan opsi tahun dari 2020 hingga tahun saat ini
                        $tahun_sekarang = date("Y");
                        for ($tahun = 2020; $tahun <= $tahun_sekarang; $tahun++) {
                            $selected = ($tahun == $selected_year) ? 'selected' : '';
                            echo "<option value='$tahun' $selected>$tahun</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
                <div class="col-sm-3">
                    <a href="tambah.php" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
        </form>

        <hr>

        <h2 class="text-center">Data untuk bulan
            <?php echo date('F', mktime(0, 0, 0, $selected_month, 1)) . " $selected_year"; ?>
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered custom-border mx-auto" style="width: 80%;">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Kiloan</th>
                    <th>Harga Total</th>
                    <th>Total</th>

                </tr>
                <?php

                $i = 1;
                // Tampilkan data dari hasil query
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        $formatted_date = date('d-m-Y', strtotime($row['tanggal']));
                        echo "<td>" . $formatted_date . "</td>";
                        echo "<td>" . "Ayam " . $row['kiloan_ayam'] . " Kg X Rp " . $row['harga_ayam'] . "<br>" . "<p>" . "Tulang " . $row['kiloan_tulang'] . " Kg X Rp " . $row['harga_tulang'] . "</p>" . "</td>";
                        echo "<td>" . "Rp " . $row['total_ayam'] . "<br>" . "<p>" . "Rp " . $row['total_tulang'] . "</td>";
                        echo "<td>" . "Rp " . $row['total_ayam'] . " - " . $row['total_tulang'] . " = Rp " . $row['grand_total'];

                        echo "</tr>";
                        $i++;
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>