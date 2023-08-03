<?php
require "b6spBbackEnd.php";
$ambilDataBarang = keranjangData("SELECT *  FROM b6spbarang");
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
  <title>Satuan perBarang</title>
</head>

<body>
  <a href="b6spBInsert.php">Tambah Satuan perBarang</a>
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
      <th>Satuan Barang</th>
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
          <?php $barang = $dataBarang["barang"];
          $ambilData1 = keranjangData("SELECT *  FROM b2jenis_barang WHERE id = $barang ");
          foreach ($ambilData1 as $dataBarang1) {
            echo $dataBarang1["nama"];
          } ?>
        </td>
        <td>
          <?php $satuan = $dataBarang["satuan"];
          $ambilData2 = keranjangData("SELECT *  FROM b4satuan WHERE id = $satuan ");
          foreach ($ambilData2 as $dataBarang2) {
            echo $dataBarang2["nama"];
          }
          ?>

        </td>
        <td><a href="b6spBUpdate.php?id=<?= $dataBarang["id"]; ?>">Update </a> |
          <a href="b6spBDelete.php?id=<?= $dataBarang["id"]; ?>" onclick="return confirm ('Apakah anda yakin ?'); ">Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>
  <a href="../../index.php">index</a><br>
</body>

</html>