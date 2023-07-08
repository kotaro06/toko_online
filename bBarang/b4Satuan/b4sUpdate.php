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
require "b4sbackEnd.php";
if (!isset($_GET["id"])) {
  header("location: b4sIndex.php");
}
$id = $_GET['id'];
$ambilDataSatuan = keranjangData("SELECT *  FROM b4satuan WHERE id = $id");
foreach ($ambilDataSatuan as $dataSatuan)
  ;
if (isset($_POST['update'])) {
  if (updateSatuan($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'b4sIndex.php';
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
          <input hidden type"text" name="id" value="<?= $dataSatuan["id"]; ?>" required>
          <input type"text" name="nama" value="<?= $dataSatuan["nama"]; ?>" required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="update">Update Satuan</button></li>
  </form>
  <a href="b4sIndex.php">Tampil Barang</a>
</body>

</html>