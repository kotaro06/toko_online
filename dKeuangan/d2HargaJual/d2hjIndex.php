<?php
require "d2hjBackEnd.php";
$ambilData = keranjangData("SELECT *  FROM d2hargajual");
if (isset($_POST['konversi'])) {

  echo "jadi";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nama Konversi</title>
</head>

<body>
  <a href="d2hjInsert.php">Tambah konversi</a>
  <br><br><br>
  <br><br>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>id</th>
      <th>Nama Produk</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Action</th>
    </tr>

    <?php if (empty($ambilData)): ?>
      <tr>
        <td colspan="8">
          <p> Data Satuan Tidak ditemukan</p>
        </td>
      </tr>
    <?php endif ?>

    <?php
    $i = 1;
    foreach ($ambilData as $dataKonversi) {
      ?>
      <tr>
        <td>
          <?= $i++; ?>
        </td>
        <td>
          <?php $produk = $dataKonversi["nama"];
          $ambilData1 = keranjangData("SELECT *  FROM b2jenis_barang WHERE id = $produk ");
          foreach ($ambilData1 as $dataKonversi1) {
            echo $dataKonversi1["nama"];
          } ?>
        </td>
        <td>
          <?= $dataKonversi["harga"];
          ?>
        </td>
        <td>
          <?php $satuan = $dataKonversi["satuan"];
          $ambilData4 = keranjangData("SELECT *  FROM b4satuan WHERE id = $satuan ");
          foreach ($ambilData4 as $dataKonversi4) {
            echo $dataKonversi4["nama"];
          } ?>
        </td>

        <td><a href="d2hjUpdate.php?id=<?= $dataKonversi["id"]; ?>">Update </a> |
          <a href="d2hjDelete.php?id=<?= $dataKonversi["id"]; ?>"
            onclick="return confirm ('Apakah anda yakin ?'); ">Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>

  <a href="../../index.php">index</a><br>
</body>

</html>