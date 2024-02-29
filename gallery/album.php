<?php
    session_start();
    if(!isset($_SESSION['userid'])) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ALBUM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            color: #adb5bd;
            background-color: white;
            font-family: arial;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid" style="background-color: #adb5bd;">
  
    <h1 style="color: white; padding-left: 20px; padding-right: 100px; ">Galery</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-light bg-ligh">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php" style="color: white; font-size: 20px;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php" style="color: white; font-size: 20px;padding-right:20px">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php" style="color: white; font-size: 20px;">Foto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color: white; font-size: 20px;">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container" style="margin: 0 auto; width: 400px;">
        <form action="tambah_album.php" method="post">
            <h1 style="padding-top: 50px; text-align: center; color: #adb5bd;">HALAMAN ALBUM</h1>
            <h6 style="color: white; font-weight: bold; text-align: left; padding-top: 40px; color:#adb5bd;">Tambah Album</h6>
            <label for="namaalbum" style=" color:  #adb5bd; font-weight: bold; text-align: center; padding-top: -30px; padding-bottom: 10px;">Nama Album</label>
            <input type="text" name="namaalbum" id="namaalbum" style="border-radius: 5px; width: 100%;">
            <label for="deskripsi" style=" color:  #adb5bd; font-weight: bold; text-align: center; padding-top: 25px; padding-bottom: 10px;">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" style="border-radius: 5px; width: 100%;">
            <div class="container" style="padding-top: 10px; padding-bottom: 50px; margin-left: -10px;">
                <td></td>
                <input type="submit" value="Tambah">
            </div>
        </form>
    </div>
        <div class="container" style="margin: 0 auto; width: 1000px; padding-right: 100px;">
        <table class="table-bordered" border="1" cellpadding="5" cellspacing="0" style="width: 100%; margin-right: 100px; border: 2px solid #adb5bd;">
          <tr>
            <th style="text-align: center; background-color: white; color: #adb5bd;">ID</th>
            <th style="text-align: center; background-color: white; color: #adb5bd;">Nama Album</th>
            <th style="text-align: center; background-color: white; color: #adb5bd;">Deskripsi</th>
            <th style="text-align: center; background-color: white; color: #adb5bd;">Tanggal Dibuat</th>
            <th style="text-align: center; background-color: white; color: #adb5bd;">Aksi</th>
          </tr>
        <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn,"select * from album where userid='$userid'");
            while($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td style="text-align: center; background-color: white; color: #adb5bd;"><?= $data['albumid'] ?></td>
            <td style="text-align: center; background-color: white; color: #adb5bd;"><?= $data['namaalbum'] ?></td>
            <td style="text-align: center; background-color: white; color: #adb5bd;"><?= $data['deskripsi'] ?></td>
            <td style="text-align: center; background-color: white; color: #adb5bd;"><?= $data['tanggaldibuat'] ?></td>
            <td style="text-align: center; background-color: white; color: #adb5bd;">
            <button type="button" class="btn btn-danger"><a href="hapus_album.php?albumid=<?= $data['albumid'] ?>" style="color: white; text-decoration: none;">Hapus</a></button>
            <button type="button" class="btn btn-success"><a href="edit_album.php?albumid=<?= $data['albumid'] ?>" style="color: white; text-decoration: none;">Edit</a></button>
            </td>
        </tr>
        <?php
            }
        ?>
        </table>
        </div>
    </div>
    <div class="container-fluid fixed-bottom" style="background-color: black; text-align: center; color: white;"> &copy; </div>
</body>
</html>