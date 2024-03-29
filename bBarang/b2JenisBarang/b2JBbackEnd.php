<?php
function koneksi2()
{
  return mysqli_connect("localhost", "root", "", "toko"); //contoh ambil koneksi 2
}

function keranjangData($keranjangData)
{
  $koneksi1 = koneksi2();
  $ambilData = mysqli_query($koneksi1, $keranjangData);
  $dataX = [];
  while ($beriData = mysqli_fetch_assoc($ambilData)) {
    $dataX[] = $beriData;
  }
  return $dataX;
}


//===========================Barang====================
function tambahBarang($tambahDataBarang)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $ambilIdUnikBarang = keranjangData("SELECT *  FROM b2jenis_barang ORDER BY id DESC LIMIT 1");
  foreach ($ambilIdUnikBarang as $idUnikB)
    ;
  $folder = '../../gambar/';
  $n_g = $_FILES['gambar']['name'];
  $sumber_F = $_FILES['gambar']['tmp_name'];
  move_uploaded_file($sumber_F, $folder . $n_g);
  $nama = htmlspecialchars($tambahDataBarang['nama']);

  $tambahDataSimpanBarang = " INSERT INTO 
                          b2jenis_barang
                        VALUE 
  (null,'$n_g','$nama') ";
  mysqli_query($koneksi, $tambahDataSimpanBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateBarang($tambahDataBarang)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahDataBarang['id'];
  $folder = '../../gambar/';
  $n_g = $_FILES['gambar']['name'];
  $sumber_F = $_FILES['gambar']['tmp_name'];
  move_uploaded_file($sumber_F, $folder . $n_g);
  $nama = htmlspecialchars($tambahDataBarang['nama']);

  $tambahDataUpdateBarang = " UPDATE b2jenis_barang
   SET
   gambar = '$n_g',
   nama = '$nama' WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusBarang($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM b2jenis_barang WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}

function cari($dataBarang)
{
  $koneksi = koneksi2();
  $keranjangBarang = "SELECT * FROM b2jenis_barang
  WHERE nama LIKE '%$dataBarang%'";

  $ambilData = mysqli_query($koneksi, $keranjangBarang);
  $dataX = [];
  while ($beriData = mysqli_fetch_assoc($ambilData)) {
    $dataX[] = $beriData;
  }
  return $dataX;
}