<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-color: #ffffcc; text-align:center; padding:50px;">
<?php
require 'function.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script> alert('user baru berhasil ditambahkan!');</script>";
  } else {
    echo mysqli_error($conn);
  }
}

$carikode = mysqli_query($conn, "SELECT kode_user FROM user") or die(mysqli_error($id_admin));
// menjadikannya array
$datakode = mysqli_fetch_array($carikode);
$jumlah_data = mysqli_num_rows($carikode);
// jika $datakode
if ($datakode) {
  $kode = $jumlah_data + 1;
  // hasil untuk menambahkan kode
  // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
  // atau angka sebelum $kode
  $kode_otomatis = "USR" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $kode_otomatis = "USR001";
}
?>
<div class="container" style="background-color:	#a6a6a6; text-align:center; border-radius: 20px; width: 750px; height: 450px;"> 
  <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">REGISTRASI</h1>
  </div>
  <div class="row">
    <div class="col-lg-6 offset-3">
      <form class="user" method="post" action="">
        <div class="form-group row">
          <div class="col mb-3 mb-sm-0">
            <input type="hidden" class="form-control form-control-static" id="kode_user" name="kode_user" value="<?= $kode_otomatis; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <div class="col mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-static" id="nama_user" name="nama_user" placeholder="masukkan nama user....">
          </div>
        </div>
        <div class="form-group row">
          <div class="col mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-static" id="username" name="username" placeholder="masukkan username...">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-static" id="password" name="password" placeholder="Password">
          </div>
          <div class="col-sm-6">
            <input type="password" class="form-control form-control-static" id="password2" name="password2" placeholder="Repeat Password">
          </div>
        </div>
        <div class="form-group row">
          <div class="col mb-3 mb-sm-0">
            <input type="email" class="form-control form-control-static" id="email" name="email" placeholder="masukkan email...">
          </div>
        </div>
        <div class="form-group row">
          <div class="col mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-static" id="no_hp" name="no_hp" placeholder="masukkan no hp...">
          </div>
        </div>
        <!-- <div class="form-group">
          <p>Tambahkan Gambar : <br/><input type='file' id='file_gambar' name='file_gbr'></p>
        </div> -->
        <div class="form-row align-items-center">
      <div class="col-auto my-1">
        <select class="custom-select mr-sm-2" name ="level" id="inlineFormCustomSelect">
          <option selected>Opsi</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div></div>
        <div class="text-right">
          <input class="btn btn-primary" name="register" type="submit" value="TAMBAH"><br>
          </input>
        </div>
      </form>
    </div>
  </div>
</div>
<br>
</body>
</html>