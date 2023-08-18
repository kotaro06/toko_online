<?php
require "cA1BackEnd.php";
if (!isset($_GET["id"])) {
  header("location: cA1Index.php");
}
$id = $_GET['id'];

if (hapusBarang($id) > 0) {
  echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'cA1Index.php';
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
  <title>Delete Barang</title>
</head>

<body>
  <a href="cA1Index.php">Tampil Barang</a>
</body>

</html>