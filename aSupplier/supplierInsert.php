<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Barang</title>
</head>
<?php
require "backEnd.php";

if (isset($_POST['tambah'])) {
  if (tambahBarang($_POST) > 0) {
    echo "<script>
            alert('data berhasil disimpan');
            document.location.href = 'index.php';
          </script>";
  } else
    echo " gagal nambah";
}
?>

<body>
  <h3> Form Tambah Data Barang</h3>
  <form action=" " method="POST">
    <ul>
      <li>
        <label>
          Nama Supplier :
          <input type"text" name="nama" autofocus required>
        </label>
      </li>
    </ul>
    <ul>
      <li>
        <label>
          Alamat Supplier :
          <input type"text" name="alamat" autofocus required>
        </label>
      </li>
    </ul>
    <ul>
      <li>
        <label>
          Telepon Supplier :
          <input type"text" name="tlpn" autofocus required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="tambah">Tambah Supplier</button></li>
  </form>
  <a href="index.php">Tampil Supplier</a>
</body>

</html>