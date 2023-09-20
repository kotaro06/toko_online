<?php
require "d3skBackEnd.php";
$ambilData = keranjangData("SELECT *  FROM d3sejarah_kulaan");
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
  <a href="d3skInsert.php">Tambah konversi</a>
  <br><br><br>
  <br><br>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>id</th>
      <th>Gambar</th>
      <th>Tanggal</th>
      <th>Nama Produk</th>
      <th>Warna</th>
      <th>Supplier</th>
      <th>Stock</th>
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
          <img src="../../gambar/notaKulaan/<?= $dataKonversi["gambar"]; ?>" width="25 pixel" />
        </td>
        <td>
          <?= $dataKonversi["tgl"]; ?>
        </td>
        <td>
          <?php $produk = $dataKonversi["nama"];
          $ambilData1 = keranjangData("SELECT *  FROM b2jenis_barang WHERE id = $produk ");
          foreach ($ambilData1 as $dataKonversi1) {
            echo $dataKonversi1["nama"];
          } ?>
        </td>
        <td>
          <?php $warna = $dataKonversi["warna"];
          $ambilData2 = keranjangData("SELECT *  FROM benang_yamalon_kecil WHERE id = $warna ");
          foreach ($ambilData2 as $dataWarna) {
            echo $dataWarna["nomor"];
          } ?>
        </td>
        <td>
          <?php $supplier = $dataKonversi["supplier"];
          $ambilData3 = keranjangData("SELECT *  FROM a1supplier WHERE id = $supplier ");
          foreach ($ambilData3 as $dataSupplier) {
            echo $dataSupplier["nama"];
          } ?>
        </td>
        <td>
          <?= $dataKonversi["stock"];
          ?>
        </td>
        <td>
          <?php $satuan = $dataKonversi["satuan"];
          $ambilData4 = keranjangData("SELECT *  FROM b4satuan WHERE id = $satuan ");
          foreach ($ambilData4 as $dataKonversi4) {
            echo $dataKonversi4["nama"];
          } ?>
        </td>
        <td>
          <?= $dataKonversi["harga"];
          ?>
        </td>
        <td><a href="d3skUpdate.php?id=<?= $dataKonversi["id"]; ?>">Update </a> |
          <a href="d3skDelete.php?id=<?= $dataKonversi["id"]; ?>"
            onclick="return confirm ('Apakah anda yakin ?'); ">Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>

  <a href="../../index.php">index</a><br>
</body>

</html>