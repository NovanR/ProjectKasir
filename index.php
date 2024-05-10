<?php
require 'functions.php';
$ayam = query('SELECT * FROM hitung');


// while ($mhs = mysqli_fetch_assoc($result)) {}

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chicken lator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="main_judul">
    <h1>Chicken Lator</h1>

  </div>

  <div class="data">

    <div class="tanggal">
      <p>
        Tanggal: <?php echo date("l, d-m-y"); ?>
      </p>

      <a class="btn btn-primary" href="tambahdata.php" role="button">Tambah data</a>
    </div>

    <div class="table_responsive">

      <table class="table table-bordered border-primary">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jumlah Kiloan</th>
            <th scope="col">Harga Total</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ayam as $row): ?>
            <tr>
              <td><?= $row["No"]; ?></td>
              <td><?= $row["tanggal"]; ?></td>
              <td>Ayam <?= $row["jumlah_kiloan"]; ?> Kg X Rp <?= $row["harga_ayam"]; ?>
                <br>
                <p>Tulang <?= $row["tulang"]; ?> Kg X 11000</p>
              </td>
              <td><?php
              echo "Rp ";
              $harga_total_ayam = $row["jumlah_kiloan"] * $row["harga_ayam"];
              echo $harga_total_ayam;
              ?>

                <br>
                <?php

                echo "Rp ";
                $harga_total_tulang = $row["tulang"] * 11000;
                echo $harga_total_tulang;
                ?>
              </td>
              <td>
                <?php
                echo "Rp ";
                echo $harga_total_ayam . " - ". $harga_total_tulang. " = ";
                $total = $harga_total_ayam - $harga_total_tulang;
                echo "Rp ";
                echo $total;

                ?>

              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>