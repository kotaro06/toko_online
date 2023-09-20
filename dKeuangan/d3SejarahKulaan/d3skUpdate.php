<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Satuan</title>

</head>
<?php
require "d3skBackEnd.php";
$ambilData1 = keranjangData("SELECT *  FROM b2jenis_barang");
$ambilData2 = keranjangData("SELECT *  FROM benang_yamalon_kecil");
$ambilData3 = keranjangData("SELECT *  FROM a1supplier");
$ambilData4 = keranjangData("SELECT *  FROM b4satuan");

if (!isset($_GET["id"])) {
  header("location: d3skIndex.php");
}
$id = $_GET['id'];
$ambilData = keranjangData("SELECT *  FROM d3sejarah_kulaan WHERE id = $id");
foreach ($ambilData as $dataKonversi)
  ;
if (isset($_POST['update'])) {
  if (updateSatuan($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'd3skIndex.php';
          </script>";
  } else
    echo " gagal update";
}
?>

<body>
  <h3> Form Update Data Sejarah Kulaan</h3>
  <form action=" " method="POST" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Tanggal :
          <input hidden type"text" name="id" value="<?= $dataKonversi["id"]; ?>" required>
          <input type="date" name="tgl" value="<?= $dataKonversi["tgl"]; ?>" required>
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
          $barang = $dataKonversi["nama"];
          $ambilData1a = keranjangData("SELECT *  FROM b2jenis_barang WHERE id = $barang ");
          foreach ($ambilData1a as $dataB) {
            echo "<option value=", $dataB['id'], ">", $dataB['nama'], "</+option>";

            foreach ($ambilData1 as $dataB1) {

              if ($barang == $dataB1['id']) {
              } else {
                echo "<option value=", $dataB1['id'], ">", $dataB1['nama'],
                  "</option>";

              }

            }
          }

          ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Warna :
          <select name="warna">
            <?php
            $w = $dataKonversi["warna"];
            $ambilData2a = keranjangData("SELECT *  FROM benang_yamalon_kecil WHERE id = $w ");
            foreach ($ambilData2a as $dataW) {
              echo "<option value=", $dataW['id'], ">", $dataW['nomor'], "</+option>";

              foreach ($ambilData2 as $dataW1) {

                if ($w == $dataW1['id']) {
                } else {
                  echo "<option value=", $dataW1['id'], ">", $dataW1['nomor'],
                    "</option>";

                }

              }
            }

            ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Supplier :
          <select name="supplier">
            <?php
            $s = $dataKonversi["supplier"];
            $ambilData3a = keranjangData("SELECT *  FROM a1supplier WHERE id = $s ");
            foreach ($ambilData3a as $dataS) {
              echo "<option value=", $dataS['id'], ">", $dataS['nama'], "</+option>";

              foreach ($ambilData3 as $dataS1) {

                if ($s == $dataS1['id']) {
                } else {
                  echo "<option value=", $dataS1['id'], ">", $dataS1['nama'],
                    "</option>";

                }

              }
            }

            ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Stock :
          <input type"text" name="stock" value="<?= $dataKonversi["stock"]; ?>" required>
        </label>
      </li>
      <li>
        <label>
          Satuan :
          <select name="satuan">
            <?php
            $d1 = $dataKonversi['satuan'];
            $ambilData = keranjangData("SELECT *  FROM b4satuan WHERE id = $d1");
            foreach ($ambilData as $dataSatuan) {
              echo "<option value=", $dataSatuan['id'], ">", $dataSatuan['nama'], "</+option>";

              foreach ($ambilData4 as $dataSatuan3) {

                if ($d1 == $dataSatuan3['id']) {
                } else {
                  echo "<option value=", $dataSatuan3['id'], ">", $dataSatuan3['nama'],
                    "</option>";

                }

              }
            }

            ?>
          </select>
        </label>
      </li>
      <li>
        <label>
          Harga :
          <input type"text" name="harga" value="<?= $dataKonversi["harga"]; ?>" required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="update">Update Satuan</button></li>
  </form>
  <a href="d3skIndex.php">Tampil Barang</a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>