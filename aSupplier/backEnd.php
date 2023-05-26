<?php
function koneksi2()
{
  return mysqli_connect("localhost", "root", "", "toko"); //contoh ambil koneksi 2
}

function keranjangData($keranjangData)
{
  $koneksi = koneksi2();
  $ambilData = mysqli_query($koneksi, $keranjangData);
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
function tambahBarang($tambahDataSupplier)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $ambilIdUnikBarang = keranjangData("SELECT *  FROM a1supplier ORDER BY id DESC LIMIT 1");
  foreach ($ambilIdUnikBarang as $idUnikB)
    ;

  $nama = htmlspecialchars($tambahDataSupplier['nama']);
  $alamat = htmlspecialchars($tambahDataSupplier['alamat']);
  $tlpn = htmlspecialchars($tambahDataSupplier['tlpn']);

  $tambahDataSimpanBarang = " INSERT INTO a1supplier                          
                        VALUE
  (null, '$nama', '$alamat', '$tlpn') ";
  mysqli_query($koneksi, $tambahDataSimpanBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateBarang($tambahDataSupplier)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahDataSupplier['id'];
  $nama = htmlspecialchars($tambahDataSupplier['nama']);
  $alamat = htmlspecialchars($tambahDataSupplier['alamat']);
  $tlpn = htmlspecialchars($tambahDataSupplier['tlpn']);

  $tambahDataUpdateBarang = " UPDATE a1supplier
   SET
   nama = '$nama', 
   alamat = '$alamat',
   tlpn = '$tlpn' WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusBarang($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM a1supplier WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}

function cari($dataSupplier)
{
  $koneksi = koneksi2();
  $keranjangBarang = "SELECT * FROM a1supplier
  WHERE nama LIKE '%$dataSupplier%'";

  $ambilData = mysqli_query($koneksi, $keranjangBarang);
  $dataX = [];
  while ($beriData = mysqli_fetch_assoc($ambilData)) {
    $dataX[] = $beriData;
  }
  return $dataX;
}