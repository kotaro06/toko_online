<?php
require "backEnd.php";
//$idUnik = keranjangData("SELECT *  FROM login ORDER BY id DESC LIMIT ");
//echo $idUnik["id"];
$dataIdX = $_GET['id'];
if ($dataIdX == "a") {
  $ambilDataLogin = keranjangData("SELECT *  FROM login");
  if (isset($_POST['tambah'])) {

    if (tambah($_POST) > 0) {
      echo "data berhasil ditambah";
    } else
    if (hapus($_GET["id"])) {
    } else

      echo " gagal nambah";
  }
} else 
if ($dataIdX >= 0) {
  $ambilDataLogin = keranjangData("SELECT *  FROM login WHERE id='$dataIdX'");
  foreach ($ambilDataLogin as $dataLogi2);
}



?>
<!DOCTYPE html>
<html lang="en">


<hea>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</hea>

<body>
  <h1>Penggunaan</h1>
  <br>
  //lihat data
  <table border="1" cellpadding="10" cellspacing="0">
    <?php  ?>
    <tr>
      <th>id</th>
      <th>nama</th>
      <th>password</th>
      <th>email</th>
      <th>Status</th>
      <th>Pilih</th>
    </tr>
    <?php
    $i = 1;
    foreach ($ambilDataLogin as $dataLogin) {
    ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $dataLogin["nama"]; ?></td>
        <td><?= $dataLogin["password"]; ?></td>
        <td><?= $dataLogin["email"]; ?></td>
        <td><?= $dataLogin["status"]; ?></td>
        <td><a href=""> edit </a>|<a href="pengguna.php?id=<?php echo $dataLogin['id']; ?>"> hapus </a></td>
      </tr>
    <?php } ?>
  </table>

  //insert
  <div class="container my-4">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">Masukkan dan Ubah Data</div>
        </div>
        <div style="padding-top:30px" class="panel-body">
          <form id="loginform" class="form-horizontal" action="" method="post" role="form">
            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="Masuk-nama" type="text" class="form-control" name="username" placeholder="username" autofocus required>
            </div>
            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="Masuk-password" type="text" class="form-control" name="password" placeholder="password" value="<?php echo $dataLogi2['username'];

                                                                                                                        ?>" required>
            </div>
            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input id="Masuk-email" type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <select name="status" id="status">
                <option value="1">Admin</option>
                <option value="2">Pengguna</option>
              </select>
            </div>
            <div style="margin-top:10px" class="form-group">
              <div class="col-sm-12 controls">
                <input type="submit" name="tambah" class="btn btn-success" value="Simpan" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>