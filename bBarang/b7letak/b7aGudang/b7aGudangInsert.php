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
require "b7aGbackEnd.php";

if (isset($_POST['tambah'])) {
  if (tambahBarang($_POST) > 0) {
    echo "<script>
            document.location.href = 'b7aGudang.php';
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
          RAK :
          <input type"text" name="rak" autofocus required>
        </label>
      </li>
      <li>
        <label>
          SAB :
          <input type"text" name="sab" autofocus required>
        </label>
      </li>
      <li>
        <label>
          KELOMPOK :
          <input type"text" name="klmpk" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Nama Barang :
          <input type"text" name="nama" autofocus required>
        </label>
      </li>
    </ul>
    <li><button type="submit" name="tambah">Tambah Barang</button></li>
  </form>
  <a href="b7aGudang.php">Tampil Barang</a>
</body>

</html>