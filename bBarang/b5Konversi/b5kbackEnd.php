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

  $nilai = htmlspecialchars($tambahData['nilai']);
  $satuan = htmlspecialchars($tambahData['satuan']);
  $nilai2 = htmlspecialchars($tambahData['nilai2']);
  $satuan2 = htmlspecialchars($tambahData['satuan2']);

  $tambahDataSimpan = " INSERT INTO 
                          b5konversi
                        VALUE 
  (null,'$nilai','$satuan','$nilai2','$satuan2') ";
  mysqli_query($koneksi, $tambahDataSimpan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateSatuan($tambahData)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahData['id'];
  $nilai = htmlspecialchars($tambahData['nilai']);
  $satuan = htmlspecialchars($tambahData['satuan']);
  $nilai2 = htmlspecialchars($tambahData['nilai2']);
  $satuan2 = htmlspecialchars($tambahData['satuan2']);

  $tambahDataUpdateSatuan = " UPDATE b5konversi
   SET
   nilai = '$nilai',
   satuan = '$satuan',
   nilai2 = '$nilai2',
   satuan2 = '$satuan2'
    WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateSatuan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusKonversi($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM b5konversi WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}