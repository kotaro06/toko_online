<?php
require "b4sbackEnd.php";
$ambilDataSatuan = keranjangData("SELECT *  FROM b4satuan");
if (isset($_POST['cari'])) {

  $ambilDataSatuan = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nama Satuan</title>
</head>

<body>
  <a href="b4sInsert.php">Tambah Satuan</a>
  <br><br><br>
  <form action="" method="POST">
    <input type="text" name="keyword" size="25" autofocus placeholder="masukkan keyword pencarian">
    <button type="submit" name="cari">Pencarian</button>
  </form>
  <br><br>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>id</th>
      <th>Nama Satuan</th>
      <th>Action</th>
    </tr>

    <?php if (empty($ambilDataSatuan)): ?>
      <tr>
        <td colspan="4">
          <p> Data Satuan Tidak ditemukan</p>
        </td>
      </tr>
    <?php endif ?>

    <?php
    $i = 1;
    foreach ($ambilDataSatuan as $dataSatuan) {
      ?>
      <tr>
        <td>
          <?= $i++; ?>
        </td>
        <td>
          <?= $dataSatuan["nama"]; ?>
        </td>
        <td><a href="b4sUpdate.php?id=<?= $dataSatuan["id"]; ?>">Update </a> |
          <a href="b4sDelete.php?id=<?= $dataSatuan["id"]; ?>" onclick="return confirm ('Apakah anda yakin ?'); ">Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>
  <a href="../../index.php">index</a><br>
</body>

</html>