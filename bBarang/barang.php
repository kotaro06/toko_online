 <?php
  require "backEnd_yamalon_kecil.php";
  $ambilDataBarang = keranjangData("SELECT *  FROM benang_yamalon_kecil");
  if (isset($_POST['cari'])) {

    $ambilDataBarang = cari($_POST['keyword']);
  }
  ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Nama Barang</title>
 </head>

 <body>
   <a href="barangInsert.php">Tambah Barang</a>
   <br><br><br>
   <form action="" method="POST">
     <input type="text" name="keyword" size="25" autofocus placeholder="masukkan keyword pencarian">
     <button type="submit" name="cari">Pencarian</button>
   </form>
   <br><br>
   <table border="1" cellpadding="10" cellspacing="0">

     <tr>
       <th>id</th>
       <th>Nama Barang</th>
       <th>Action</th>
     </tr>

     <?php if (empty($ambilDataBarang)) : ?>
       <tr>
         <td colspan="4">
           <p> Data Barang Tidak ditemukan</p>
         </td>
       </tr>
     <?php endif ?>

     <?php
      $i = 1;
      foreach ($ambilDataBarang as $dataBarang) {
      ?>
       <tr>
         <td><?= $i++; ?></td>
         <td><?= $dataBarang["nama_nomor"]; ?></td>
         <td><a href="barangUpdate.php?id=<?= $dataBarang["id"]; ?>">Update </a> |
           <a href="barangDelete.php?id=<?= $dataBarang["id"]; ?>" onclick="return confirm ('Apakah anda yakin ?'); ">Delete </a>
         </td>
       </tr>
     <?php } ?>
   </table>

 </body>

 </html>