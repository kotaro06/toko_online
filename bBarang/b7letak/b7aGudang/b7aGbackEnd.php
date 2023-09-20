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


  $rak = htmlspecialchars($tambahDataBarang['rak']);
  $sab = htmlspecialchars($tambahDataBarang['sab']);
  $klmpk = htmlspecialchars($tambahDataBarang['klmpk']);
  $nama = htmlspecialchars($tambahDataBarang['nama']);
  // $nama = '';

  $tambahDataSimpanBarang = " INSERT INTO 
                         b7agudang
                        VALUE 
  (null, '$rak', '$sab', '$klmpk', '$nama') ";

  mysqli_query($koneksi, $tambahDataSimpanBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateBarang($tambahDataBarang)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $id = $tambahDataBarang['id'];
  $rak = htmlspecialchars($tambahDataBarang['rak']);
  $sab = htmlspecialchars($tambahDataBarang['sab']);
  $klmpk = htmlspecialchars($tambahDataBarang['klmpk']);
  $nama = htmlspecialchars($tambahDataBarang['nama']);

  $tambahDataUpdateBarang = " UPDATE b7agudang
   SET
   rak = '$rak',
   sab = '$sab',
   klmpk = '$klmpk',
   nama = '$nama' WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateBarang);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusBarang($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM b7agudang WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}