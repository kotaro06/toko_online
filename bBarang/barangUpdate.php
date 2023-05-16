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
require "backEnd_yamalon_kecil.php";
if (!isset($_GET["id"])) {
  header("location: barang.php");
}
$id = $_GET['id'];
$ambilDataBarang = keranjangData("SELECT *  FROM benang_yamalon_kecil WHERE id = $id");
foreach ($ambilDataBarang as $dataBarang);
if (isset($_POST['update'])) {
  if (updateBarang($_POST) > 0) {
    echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'barang.php';
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
          Nama Barang :
          <input hidden type"text" name="id" value="<?= $dataBarang["id"]; ?>" required>
          <input type"text" name="nama" value="<?= $dataBarang["nama_nomor"]; ?>" required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="update">Update Barang</button></li>
  </form>
  <a href="barang.php">Tampil Barang</a>
</body>

</html>