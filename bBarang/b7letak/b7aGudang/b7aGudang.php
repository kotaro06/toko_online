<?php
require "b7aGbackEnd.php";
$ambilDataBarang = keranjangData("SELECT *  FROM  b7agudang");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nama Barang</title>
</head>

<body>
  <a href="b7aGudangInsert.php">Tambah Letak Barang</a>
  <br><br><br>
  <br><br>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>id</th>
      <th>Nama Barang</th>
      <th>RAK</th>
      <th>SAB</th>
      <th>KELOMPOK</th>
      <th>Action</th>
    </tr>

    <?php if (empty($ambilDataBarang)): ?>
      <tr>
        <td colspan="4">
          <p> Data Barang Tidak ditemukan</p>
        </td>
      </tr>
    <?php endif ?>

    <?php
    $i = 1;
    foreach ($ambilDataBarang as $dataBarang) {
      ?>
      <tr>
        <td>
          <?= $i++; ?>
        </td>
        <td>
          <?= $dataBarang["nama"]; ?>
        </td>
        <td>
          <?= $dataBarang["rak"]; ?>
        </td>
        <td>
          <?= $dataBarang["sab"]; ?>
        </td>
        <td>
          <?= $dataBarang["klmpk"]; ?>
        </td>
        <td><a href="b7aGudangUpdate.php?id=<?= $dataBarang["id"]; ?>">Update </a> |
          <a href="b7aGudangDelete.php?id=<?= $dataBarang["id"]; ?>"
            onclick="return confirm ('Apakah anda yakin ?'); ">Delete </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>
  <a href="../../../index.php">index</a><br>

</body>

</html>