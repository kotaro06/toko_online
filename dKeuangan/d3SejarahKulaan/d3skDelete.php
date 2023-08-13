<?php
require "d3skbackEnd.php";
if (!isset($_GET["id"])) {
  header("location: d3skIndex.php");
}
$id = $_GET['id'];

if (hapusKonversi($id) > 0) {
  echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'd3skIndex.php';
          </script>";
} else
  echo " gagal nambah";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Sejarah Kulaan</title>
</head>

<body>
  <a href="d3skIndex.php">Tampil Barang</a>
</body>

</html>