<?php
$koneksi1 = mysqli_connect("localhost", "root", "", "toko"); //contoh ambil koneksi 1
function koneksi2()
{
  return mysqli_connect("localhost", "root", "", "toko"); //contoh ambil koneksi 2
}

function keranjangData($keranjangData)
{
  global $koneksi1; //contoh ambil koneksi 1
  $ambilData = mysqli_query($koneksi1, $keranjangData);
  $dataX = [];
  while ($beriData = mysqli_fetch_assoc($ambilData)) {
    $dataX[] = $beriData;
  }
  return $dataX;
}

function tampilData($tampilData)
{
  $koneksi = koneksi2();
  $ambilData = mysqli_query($koneksi, $tampilData);
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
  $ambilIdUnikBarang = keranjangData("SELECT *  FROM benang_yamalon_kecil ORDER BY id DESC LIMIT 1");
  foreach ($ambilIdUnikBarang as $idUnikB);

  $nomor = htmlspecialchars($tambahDataBarang['nama']);
  $nama = '';
  
  $tambahDataSimpanBarang = " INSERT INTO 
                          benang_yamalon_kecil
                        VALUE 
  (null, '$nomor', '$nama') ";
  mysqli_query($koneksi, $tambahDataSimpanBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateBarang($tambahDataBarang)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahDataBarang['id'];
  $nama = htmlspecialchars($tambahDataBarang['nama']);

  $tambahDataUpdateBarang = " UPDATE benang_yamalon_kecil
   SET
   nomor = '$nama' WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusBarang($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM benang_yamalon_kecil WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}

function cari($dataBarang)
{
  $koneksi = koneksi2();
  $keranjangBarang = "SELECT * FROM benang_yamalon_kecil
  WHERE nomor LIKE '%$dataBarang%'";

  $ambilData = mysqli_query($koneksi, $keranjangBarang);
  $dataX = [];
  while ($beriData = mysqli_fetch_assoc($ambilData)) {
    $dataX[] = $beriData;
  }
  return $dataX;
}
