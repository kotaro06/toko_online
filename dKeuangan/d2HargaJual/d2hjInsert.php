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
require "d2hjBackEnd.php";
$ambilData = keranjangData("SELECT *  FROM b2jenis_barang");
$ambilData2 = keranjangData("SELECT *  FROM b4satuan");

if (isset($_POST['tambah'])) {
  if (tambahData($_POST) > 0) {
    echo "<script>
            alert('data berhasil disimpan');
            document.location.href = 'd2hjIndex.php';
          </script>";
  } else
    echo " gagal nambah";
}
?>

<body>
  <h3> Form Tambah Sejarah</h3>
  <form action=" " method="POST">
    <ul>
      <li>
        <label>
          Barang :
          <select name="barang">
            <?php
            foreach ($ambilData as $dataB) {
              echo "<option value=", $dataB['id'], ">", $dataB['nama'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Satuan :
          <select name="satuan">
            <?php
            foreach ($ambilData2 as $dataSatuan) {
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
  <a href="d2hjIndex.php">Tampil Satuan</a>
</body>

</html>