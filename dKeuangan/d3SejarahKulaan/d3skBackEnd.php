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

  $folder = '../../gambar/notaKulaan/';
  $n_g = $_FILES['gambar']['name'];
  $sumber_F = $_FILES['gambar']['tmp_name'];
  move_uploaded_file($sumber_F, $folder . $n_g);

  $nama = $tambahData['barang'];
  $warna = $tambahData['warna'];
  $supplier = $tambahData['supplier'];
  $stock = htmlspecialchars($tambahData['stock']);
  $satuan = $tambahData['satuan'];
  $harga = htmlspecialchars($tambahData['harga']);
  $tgl = htmlspecialchars($tambahData['tgl']);

  $tambahDataSimpan = " INSERT INTO 
                         d3sejarah_kulaan
                        VALUE 
  (null,'$nama','$warna','$supplier','$stock','$satuan','$harga','$tgl','$n_g') ";
  mysqli_query($koneksi, $tambahDataSimpan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function updateSatuan($tambahData)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2

  $folder = '../../gambar/notaKulaan/';
  $n_g = $_FILES['gambar']['name'];
  $sumber_F = $_FILES['gambar']['tmp_name'];
  move_uploaded_file($sumber_F, $folder . $n_g);

  $id = $tambahData['id'];
  $nama = $tambahData['barang'];
  $warna = $tambahData['warna'];
  $supplier = $tambahData['supplier'];
  $stock = htmlspecialchars($tambahData['stock']);
  $satuan = $tambahData['satuan'];
  $harga = htmlspecialchars($tambahData['harga']);
  $tgl = htmlspecialchars($tambahData['tgl']);

  $tambahDataUpdateSatuan = " UPDATE d3sejarah_kulaan
   SET
   gambar = '$n_g',
   nama = '$nama',
   warna = '$warna',
   supplier = '$supplier',
   stock = '$stock',
   satuan = '$satuan',
   harga = '$harga',
   tgl = '$tgl'
    WHERE id = $id ";

  mysqli_query($koneksi, $tambahDataUpdateSatuan);
  echo mysqli_error($koneksi);
  return mysqli_affected_rows($koneksi);
}

function hapusKonversi($id)
{
  //var_dump($tambahData);
  $koneksi = koneksi2(); //contoh ambil koneksi 2
  $tambahDataSimpan = " DELETE FROM d3sejarah_kulaan WHERE id = $id ";
  mysqli_query($koneksi, $tambahDataSimpan)
    or die(mysqli_error_list($koneksi));
  return mysqli_affected_rows($koneksi);
}