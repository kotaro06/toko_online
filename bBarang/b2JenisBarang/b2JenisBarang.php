<?php
require "b2JBbackEnd.php";
$ambilDataBarang = keranjangData("SELECT *  FROM b2jenis_barang");
if (isset($_POST['cari'])) {

  $ambilDataBarang = cari($_POST['keyword']);
}
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
  <a href="b2JBInsert.php">Tambah Barang</a>
  <br><br><br>
  <form action="" method="POST">
    <input type="text" name="keyword" size="25" autofocus placeholder="masukkan keyword pencarian">
    <button type="submit" name="cari">Pencarian</button>
  </form>
  <br><br>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>id</th>
      <th>Nama Barang</th>
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
        <td><a href="b2JBUpdate.php?id=<?= $dataBarang["id"]; ?>">Update </a> |
          <a href="b2JBDelete.php?id=<?= $dataBarang["id"]; ?>" onclick="return confirm ('Apakah anda yakin ?'); ">Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>
  <a href="../../index.php">index</a><br>
</body>

</html>