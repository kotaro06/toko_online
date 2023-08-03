<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Barang</title>
</head>
<?php
require "b6spBbackEnd.php";
$ambilData = keranjangData("SELECT *  FROM b2jenis_barang");
$ambilData2 = keranjangData("SELECT *  FROM b4satuan");

if (isset($_POST['tambah'])) {
  if (tambahData($_POST) > 0) {
    echo "<script>
            alert('data berhasil disimpan');
            document.location.href = 'b6spIndex.php';
          </script>";
  } else
    echo " gagal nambah";
}
?>

<body>
  <h3> Form Tambah Data Barang</h3>
  <form action=" " method="POST">
    <ul>
      <li>
        <label>
          Nama Barang :
          <select name="barang">
            <?php
            foreach ($ambilData as $dataBarang) {
              echo "<option value=", $dataBarang['id'], ">", $dataBarang['nama'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Satuan Barang :
          <select name="satuan">
            <?php
            foreach ($ambilData2 as $dataSatuan) {
              echo "<option value=", $dataSatuan['id'], ">", $dataSatuan['nama'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="tambah">Tambah Barang</button></li>
  </form>
  <a href="b6spIndex.php">Tampil Barang</a>
</body>

</html>