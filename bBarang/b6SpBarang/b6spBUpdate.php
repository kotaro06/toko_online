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
require "b6spBbackEnd.php";
$ambilData3 = keranjangData("SELECT *  FROM b2jenis_barang");
$ambilData2 = keranjangData("SELECT *  FROM b4satuan");
if (!isset($_GET["id"])) {
  header("location: b6spIndex.php");
}
$id = $_GET['id'];
$ambilData = keranjangData("SELECT *  FROM b6spbarang WHERE id = $id");
foreach ($ambilData as $dataSPB)
  ;
if (isset($_POST['update'])) {
  if (updateSatuan($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'b6spIndex.php';
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
          Nama Barang :
          <input hidden type"text" name="id" value="<?= $dataSPB["id"]; ?>" required>
          <select name="barang">
            <?php
            $d1 = $dataSPB['barang'];
            $ambilData = keranjangData("SELECT *  FROM b2jenis_barang WHERE id = $d1");
            foreach ($ambilData as $dataB2) {
              echo "<option value=", $dataB2['id'], ">", $dataB2['nama'], "</option>";

              foreach ($ambilData3 as $dataB2_3) {

                if ($d1 == $dataB2_3['id']) {
                } else {
                  echo "<option value=", $dataB2_3['id'], ">", $dataB2_3['nama'],
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
            $d2 = $dataSPB['satuan'];
            $ambilData1 = keranjangData("SELECT *  FROM b4satuan WHERE id = $d2");
            foreach ($ambilData1 as $dataSatuan1) {
              echo "<option value=", $dataSatuan1['id'], ">", $dataSatuan1['nama'], "</+option>";

              foreach ($ambilData2 as $dataSatuan2) {

                if ($d2 == $dataSatuan2['id']) {
                } else {
                  echo "<option value=", $dataSatuan2['id'], ">", $dataSatuan2['nama'],
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
  <a href="b6spIndex.php">Tampil Barang</a>
</body>

</html>