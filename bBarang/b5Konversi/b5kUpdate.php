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
require "b5kbackEnd.php";
$ambilData3 = keranjangData("SELECT *  FROM b4satuan");
if (!isset($_GET["id"])) {
  header("location: b5kIndex.php");
}
$id = $_GET['id'];
$ambilData = keranjangData("SELECT *  FROM b5konversi WHERE id = $id");
foreach ($ambilData as $dataKonversi)
  ;
if (isset($_POST['update'])) {
  if (updateSatuan($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'b5kIndex.php';
          </script>";
  } else
    echo " gagal update";
}
?>

<body>
  <h3> Form Update Data dataSatuan</h3>
  <form action=" " method="POST">
    <ul>
      <li>
        <label>
          Nilai :
          <input hidden type"text" name="id" value="<?= $dataKonversi["id"]; ?>" required>
          <input type"text" name="nilai" value="<?= $dataKonversi["nilai"]; ?>" required>
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

              foreach ($ambilData3 as $dataSatuan3) {

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
          Nilai 2 :
          <input type"text" name="nilai2" value="<?= $dataKonversi["nilai2"]; ?>" required>
        </label>
      </li>
      <li>
        <label>
          Satuan2 :
          <select name="satuan2">
            <?php
            $d2 = $dataKonversi['satuan2'];
            $ambilData2 = keranjangData("SELECT *  FROM b4satuan WHERE id = $d2");
            foreach ($ambilData2 as $dataSatuan2) {
              echo "<option value=", $dataSatuan2['id'], ">", $dataSatuan2['nama'], "</+option>";

              foreach ($ambilData3 as $dataSatuan3) {

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
    </ul>
    <li><button type="submit" name="update">Update Satuan</button></li>
  </form>
  <a href="b5kIndex.php">Tampil Barang</a>
</body>

</html>