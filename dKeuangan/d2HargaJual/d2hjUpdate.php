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
require "d2hjBackEnd.php";
$ambilData1 = keranjangData("SELECT *  FROM b2jenis_barang");
$ambilData2 = keranjangData("SELECT *  FROM b4satuan");

if (!isset($_GET["id"])) {
  header("location: d2hjIndex.php");
}
$id = $_GET['id'];
$ambilData = keranjangData("SELECT *  FROM d2hargajual WHERE id = $id");
foreach ($ambilData as $dataKonversi)
  ;
if (isset($_POST['update'])) {
  if (updateSatuan($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'd2hjIndex.php';
          </script>";
  } else
    echo " gagal update";
}
?>

<body>
  <h3> Form Update Data Sejarah Kulaan</h3>
  <form action=" " method="POST">
    <ul>
      <li>
        <label>
          <input hidden type"text" name="id" value="<?= $dataKonversi["id"]; ?>" required>
          Barang :
          <select name="barang">
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
          Satuan :
          <select name="satuan">
            <?php
            $d1 = $dataKonversi['satuan'];
            $ambilData = keranjangData("SELECT *  FROM b4satuan WHERE id = $d1");
            foreach ($ambilData as $dataSatuan) {
              echo "<option value=", $dataSatuan['id'], ">", $dataSatuan['nama'], "</+option>";

              foreach ($ambilData2 as $dataSatuan3) {

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
  <a href="d2hjIndex.php">Tampil Barang</a>
</body>

</html>