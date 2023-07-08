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
function tambahSatuan($tambahDataSatuan)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $ambilIdUnikSatuan = keranjangData("SELECT *  FROM b4satuan ORDER BY id DESC LIMIT 1");
  foreach ($ambilIdUnikSatuan as $idUnikB)
    ;

  $nama = htmlspecialchars($tambahDataSatuan['nama']);

  $tambahDataSimpanSatuan = " INSERT INTO 
                          b4satuan
                        VALUE 
  (null,'$nama') ";
  mysqli_query($koneksi, $tambahDataSimpanSatuan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateSatuan($tambahDataSatuan)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahDataSatuan['id'];
  $nama = htmlspecialchars($tambahDataSatuan['nama']);

  $tambahDataUpdateSatuan = " UPDATE b4satuan
   SET
   nama = '$nama' WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateSatuan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusSatuan($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM b4satuan WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}

function cari($dataBarang)
{
  $koneksi = koneksi2();
  $keranjangBarang = "SELECT * FROM b4satuan
  WHERE nama LIKE '%$dataBarang%'";

  $ambilData = mysqli_query($koneksi, $keranjangBarang);
  $dataX = [];
  while ($beriData = mysqli_fetch_assoc($ambilData)) {
    $dataX[] = $beriData;
  }
  return $dataX;
}