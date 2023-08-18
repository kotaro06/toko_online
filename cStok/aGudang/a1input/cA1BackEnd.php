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
  $ambilIdUnikBarang = keranjangData("SELECT *  FROM c1astokin ORDER BY id DESC LIMIT 1");
  foreach ($ambilIdUnikBarang as $idUnikB)
    ;

  $nama = $tambahDataBarang['barang'];
  $warna = $tambahDataBarang['warna'];
  $stock = htmlspecialchars($tambahDataBarang['stock']);
  $satuan = $tambahDataBarang['satuan'];

  $tambahDataSimpanBarang = " INSERT INTO 
                          c1astokin
                        VALUE 
  (null,'$nama','$warna','$stock','$satuan') ";
  mysqli_query($koneksi, $tambahDataSimpanBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateBarang($tambahDataBarang)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahDataBarang['id'];
  $nama = $tambahDataBarang['barang'];
  $warna = $tambahDataBarang['warna'];
  $stock = htmlspecialchars($tambahDataBarang['stock']);
  $satuan = $tambahDataBarang['satuan'];

  $tambahDataUpdateBarang = " UPDATE c1astokin
   SET
   nama = '$nama',
   warna = '$warna',
   stockin = '$stock',
   satuan = '$satuan'
    WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusBarang($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM c1astokin WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}

function cari($dataBarang)
{
  $koneksi = koneksi2();
  $keranjangBarang = "SELECT * FROM c1astokin
  WHERE nama LIKE '%$dataBarang%'";

  $ambilData = mysqli_query($koneksi, $keranjangBarang);
  $dataX = [];
  while ($beriData = mysqli_fetch_assoc($ambilData)) {
    $dataX[] = $beriData;
  }
  return $dataX;
}