<?php
require "cA1BackEnd.php";

$jmlhData = 5;
$koneksi = koneksi2();
$ambilIdUnikBarang = mysqli_query($koneksi, "SELECT *  FROM c1astokin");
$totalData = mysqli_num_rows($ambilIdUnikBarang);
$jmlhPage = ceil($totalData / $jmlhData);


//echo $jmlhData . "<br>" . $totalData . "<br>" . $jmlhPage;
if (isset($_GET['halaman'])) {
  $halamanAktif = $_GET['halaman'];
} else {
  $halamanAktif = 1;
}
$dataAwal = ($halamanAktif * $jmlhData) - $jmlhData;
$ambilDataBarang = keranjangData("SELECT *  FROM c1astokin LIMIT $dataAwal,$jmlhData");

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
  <a href="cA1Insert.php">Tambah Barang</a>
  <br><br><br>
  <form action="" method="POST">
    <input type="text" name="keyword" size="25" autofocus placeholder="masukkan keyword pencarian">
    <button type="submit" name="cari">Pencarian</button>
  </form>
  <br>
  <?php
  for ($i = 1; $i <= $jmlhPage; $i++): ?>

    <a href="?halaman=<?php echo $i ?>"> <?php echo $i ?></a>


    <?php
  endfor;
  ?>
  <br>

  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>id</th>

      <th>Nama Produk</th>
      <th>Warna</th>
      <th>Stock</th>
      <th>Satuan</th>
      <th>Action</th>
    </tr>

    <?php

    if (empty($ambilDataBarang)): ?>
      <tr>
        <td colspan="6">
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
          <?php $produk = $dataBarang["nama"];
          $ambilData1 = keranjangData("SELECT *  FROM b2jenis_barang WHERE id = $produk ");
          foreach ($ambilData1 as $dataKonversi1) {
            echo $dataKonversi1["nama"];
          } ?>
        </td>
        <td>
          <?php $warna = $dataBarang["warna"];
          $ambilData2 = keranjangData("SELECT *  FROM benang_yamalon_kecil WHERE id = $warna ");
          foreach ($ambilData2 as $dataWarna) {
            echo $dataWarna["nomor"];
          } ?>
        </td>
        <td>
          <?= $dataBarang["stockin"];
          ?>
        </td>
        <td>
          <?php $satuan = $dataBarang["satuan"];
          $ambilData4 = keranjangData("SELECT *  FROM b4satuan WHERE id = $satuan ");
          foreach ($ambilData4 as $dataKonversi4) {
            echo $dataKonversi4["nama"];
          } ?>
        </td>
        <td><a href="cA1Update.php?id=<?= $dataBarang["id"]; ?>">Update </a> |
          <a href="cA1Delete.php?id=<?= $dataBarang["id"]; ?>" onclick="return confirm ('Apakah anda yakin ?'); ">Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>
  <a href="../../../index.php">index</a><br>
</body>

</html>