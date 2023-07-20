<?php
require "b5kbackEnd.php";
$ambilData = keranjangData("SELECT *  FROM b5konversi");
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
  <a href="b5kInsert.php">Tambah konversi</a>
  <br><br><br>
  <br><br>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>id</th>
      <th>nilai</th>
      <th>satuan</th>
      <th>nilai2</th>
      <th>satuan2</th>
      <th>Action</th>
    </tr>

    <?php if (empty($ambilData)): ?>
      <tr>
        <td colspan="5">
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
          <?= $dataKonversi["nilai"]; ?>
        </td>
        <td>
          <?php $satuan = $dataKonversi["satuan"];
          $ambilData1 = keranjangData("SELECT *  FROM b4satuan WHERE id = $satuan ");
          foreach ($ambilData1 as $dataKonversi1) {
            echo $dataKonversi1["nama"];
          } ?>
        </td>
        <td>
          <?= $dataKonversi["nilai2"]; ?>
        </td>
        <td>
          <?php $satuan2 = $dataKonversi["satuan2"];
          $ambilData2 = keranjangData("SELECT *  FROM b4satuan WHERE id = $satuan2 ");
          foreach ($ambilData2 as $dataKonversi2) {
            echo $dataKonversi2["nama"];
          }
          ?>
        </td>
        <td><a href="b5kUpdate.php?id=<?= $dataKonversi["id"]; ?>">Update </a> |
          <a href="b5kDelete.php?id=<?= $dataKonversi["id"]; ?>" onclick="return confirm ('Apakah anda yakin ?'); ">Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </table><br>
  <br>hitungan parameter<br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>nilai</th>
      <th>satuan</th>
      <th>nilai2</th>
      <th>satuan2</th>
      <th>Tombol</th>
    </tr>
    <tr>
      <form action="" method="POST">
        <td><input type"text" name="nilai" required></td>
        <td>
          <select name="satuan2">
            <?php
            $ambilData3 = keranjangData("SELECT *  FROM b4satuan");
            foreach ($ambilData3 as $dataSatuan3) {
              echo "<option value=", $dataSatuan3['id'], ">", $dataSatuan3['nama'],
                "</option>";

            } ?>
          </select>
        </td>
        <td>a</td>
        <td><select name="satuan2">
            <?php
            $ambilData4 = keranjangData("SELECT *  FROM b4satuan");
            foreach ($ambilData4 as $dataSatuan4) {
              echo "<option value=", $dataSatuan4['id'], ">", $dataSatuan4['nama'],
                "</option>";

            } ?>
          </select></td>
        <td>

          <button type="submit" name="konversi">Konversi</button>
      </form>
      </td>
    </tr>
  </table>
  <br><br>
  <a href="../../index.php">index</a><br>
</body>

</html>