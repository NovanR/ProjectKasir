<?php 
setlocale(LC_TIME, 'id_ID');
$nama_hari = strftime('%A');

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
    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="date">Tanggal:</label>
        <input type="text" id="date" name="date" value="<?php echo date($nama_hari.'d-m-Y'); ?>" readonly </div>
        <br>
        <div class="mb-3">
          <label for="kiloanAyam" class="form-label"> Kiloan ayam</label>
          <input type="text" class="form-control" id="kiloanAyam" name="kiloanAyam">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>