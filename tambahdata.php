<?php

require 'functions.php';
// Buat objek DateTime untuk mendapatkan tanggal saat ini
$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
// Buat formatter untuk menampilkan nama hari dalam bahasa Indonesia
$formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN);


function tambah($data)
{
  global $conn;

  // ambil data dari tiap elemen
  $tanggal = htmlspecialchars($data['date']);
  $kiloanAyam = htmlspecialchars($data["kiloanAyam"]);
  $hargaAyam = htmlspecialchars($data["hargaAyam"]);
  $totalAyam = $kiloanAyam * $hargaAyam;
  $kiloanTulang = htmlspecialchars($data["kiloanTulang"]);
  $hargaTulang = 11000;
  $totalTulang = $kiloanTulang * $hargaTulang;
  $grandTotal = $totalAyam - $totalTulang;

  // query insert
  $query = "INSERT INTO hitung
  VALUES
  (null,'$tanggal','$kiloanAyam','$hargaAyam','$totalAyam','$kiloanTulang','$hargaTulang','$totalTulang', '$grandTotal')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

}


// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {



  // cek data apakah berhasil/tidak
  if (tambah($_POST) > 0) {
    echo "<script>
      alert('data berhasil ditambahkan!');
      </script>";
  } else {
    echo "<script>
          alert('data gagal ditambahkan!');   
      </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .tambah {
      width: 80%;
      padding: 20px;
    }
  </style>
</head>

<body>

  <div class="tambah">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="date">Tanggal:</label>
        <input type="text" id="date" name="date" value="<?php echo date('d-m-Y'); ?>" readonly>
        <br>
        <div class="mb-3">
          <label for="kiloanAyam" class="form-label"> Kiloan ayam</label>
          <input type="text" class="form-control" id="kiloanAyam" name="kiloanAyam">
        </div>
        <div class="mb-3">
          <label for="hargaAyam" class="form-label"> Harga Ayam</label>
          <input type="text" class="form-control" id="hargaAyam" name="hargaAyam">
        </div>
        <div class="mb-3">
          <label for="kiloanTulang" class="form-label"> Kiloan Tulang</label>
          <input type="text" class="form-control" id="kiloanTulang" name="kiloanTulang">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <br><br>
        <a href="index.php" style="color: black;">Kembali Ke halaman admin</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>