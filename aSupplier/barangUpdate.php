<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Barang</title>
</head>
<?php
require "backEnd.php";
if (!isset($_GET["id"])) {
  header("location: index.php");
}
$id = $_GET['id'];
$ambilDataSupplier = keranjangData("SELECT *  FROM a1supplier WHERE id = $id");
foreach ($ambilDataSupplier as $dataSupplier)
  ;
if (isset($_POST['update'])) {
  if (updateBarang($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'index.php';
          </script>";
  } else
    echo " gagal update";
}
?>

<body>
  <h3> Form Update Data Barang</h3>
  <form action=" " method="POST">
    <ul>
      <li>
        <label>
          Nama Supplier :
          <input hidden type"text" name="id" value="<?= $dataSupplier["id"]; ?>" required>
          <input type"text" name="nama" value="<?= $dataSupplier["nama"]; ?>" required>
        </label>
      </li>
    </ul>
    <ul>
      <li>
        <label>
          Alamat Supplier :
          <input type"text" name="alamat" value="<?= $dataSupplier["alamat"]; ?>" required>
        </label>
      </li>
    </ul>
    <ul>
      <li>
        <label>
          Telepon Supplier :
          <input type"text" name="tlpn" value="<?= $dataSupplier["tlpn"]; ?>" required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="update">Update Supplier</button></li>
  </form>
  <a href="index.php">Supplier</a>
</body>

</html>