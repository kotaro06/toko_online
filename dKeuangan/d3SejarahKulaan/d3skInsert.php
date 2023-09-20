<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Konversi</title>

</head>
<?php
require "d3skBackEnd.php";
$ambilData = keranjangData("SELECT *  FROM b2jenis_barang");
$ambilData1 = keranjangData("SELECT *  FROM benang_yamalon_kecil");
$ambilData2 = keranjangData("SELECT *  FROM a1supplier");
$ambilData3 = keranjangData("SELECT *  FROM b4satuan");

if (isset($_POST['tambah'])) {
  if (tambahData($_POST) > 0) {
    echo "<script>
            alert('data berhasil disimpan');
            document.location.href = 'd3skIndex.php';
          </script>";
  } else
    echo " gagal nambah";
}
?>

<body>
  <h3> Form Tambah Sejarah</h3>
  <form action=" " method="POST" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Tanggal :
          <input type="date" name="tgl">
        </label>
      </li>
      <li>
        <label>
          Gambar Barang :
          <input type="file" name="gambar" ">
        </label>
      </li>
      <li>
        <label>
          Barang :
          <select name=" barang">
          <?php
          foreach ($ambilData as $dataB) {
            echo "<option value=", $dataB['id'], ">", $dataB['nama'], "</+option>";
          } ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Warna :
          <select name="warna">
            <?php
            foreach ($ambilData1 as $dataW) {
              echo "<option value=", $dataW['id'], ">", $dataW['nomor'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Supplier :
          <select name="supplier">
            <?php
            foreach ($ambilData2 as $dataSup) {
              echo "<option value=", $dataSup['id'], ">", $dataSup['nama'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Stock :
          <input type"text" name="stock" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Satuan :
          <select name="satuan">
            <?php
            foreach ($ambilData3 as $dataSatuan) {
              echo "<option value=", $dataSatuan['id'], ">", $dataSatuan['nama'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Harga :
          <input type"text" name="harga" autofocus required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="tambah">Tambah Konversi</button></li>
  </form>
  <a href="d3skIndex.php">Tampil Satuan</a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>