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
function tambahData($tambahData)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2

  $nilai = htmlspecialchars($tambahData['barang']);
  $satuan = htmlspecialchars($tambahData['satuan']);

  $tambahDataSimpan = " INSERT INTO 
                          b6spbarang
                        VALUE 
  (null,'$nilai','$satuan') ";
  mysqli_query($koneksi, $tambahDataSimpan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateSatuan($tambahData)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahData['id'];
  $barang = htmlspecialchars($tambahData['barang']);
  $satuan = htmlspecialchars($tambahData['satuan']);


  $tambahDataUpdateSatuan = " UPDATE b6spbarang SET id = '$id ',barang = '$barang',satuan = '$satuan' WHERE id = '$id' ";

  mysqli_query($koneksi, $tambahDataUpdateSatuan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusSatuan($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM b6spbarang WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}