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
require "b5kbackEnd.php";
$ambilData = keranjangData("SELECT *  FROM b4satuan");
if (isset($_POST['tambah'])) {
  if (tambahData($_POST) > 0) {
    echo "<script>
            alert('data berhasil disimpan');
            document.location.href = 'b5kIndex.php';
          </script>";
  } else
    echo " gagal nambah";
}
?>

<body>
  <h3> Form Tambah Konversi</h3>
  <form action=" " method="POST">
    <ul>
      <li>
        <label>
          Nilai :
          <input type"text" name="nilai" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Satuan :
          <select name="satuan">
            <?php
            foreach ($ambilData as $dataSatuan) {
              echo "<option value=", $dataSatuan['id'], ">", $dataSatuan['nama'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Nilai 2 :
          <input type"text" name="nilai2" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Satuan2 :
          <select name="satuan2">
            <?php
            foreach ($ambilData as $dataSatuan2) {
              echo "<option value=", $dataSatuan2['id'], ">", $dataSatuan2['nama'], "</+option>";
            } ?>
          </select>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="tambah">Tambah Konversi</button></li>
  </form>
  <a href="b5kIndex.php">Tampil Satuan</a>
</body>

</html>