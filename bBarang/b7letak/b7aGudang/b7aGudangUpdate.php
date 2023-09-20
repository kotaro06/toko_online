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
require "b7aGbackEnd.php";
if (!isset($_GET["id"])) {
  header("location: b7aGudang.php");
}
$id = $_GET['id'];
$ambilDataBarang = keranjangData("SELECT *  FROM b7agudang WHERE id = $id");
foreach ($ambilDataBarang as $dataBarang)
  ;
if (isset($_POST['update'])) {
  if (updateBarang($_POST) > 0) {
    echo "<script>            
            document.location.href = 'b7aGudang.php';
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
          <input type"text" name="rak" value="<?= $dataBarang["rak"]; ?>" required>
        </label>
      </li>
      <li>
        <label>
          Nama Barang :
          <input type"text" name="sab" value="<?= $dataBarang["sab"]; ?>" required>
        </label>
      </li>
      <li>
        <label>
          Nama Barang :
          <input type"text" name="klmpk" value="<?= $dataBarang["klmpk"]; ?>" required>
        </label>
      </li>
      <li>
        <label>
          Nama Barang :
          <input type"text" name="nama" value="<?= $dataBarang["nama"]; ?>" required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="update">Update Barang</button></li>
  </form>
  <a href="b7aGudang.php">Tampil Barang</a>
</body>

</html>