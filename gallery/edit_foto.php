<?php
    session_start();
    if(!isset($_SESSION['userid'])) {
     
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: white;
            font-family: arial;
            color:  #adb5bd;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" style="background-color:  #adb5bd;">
    <h1 style="color: white; padding-left: 20px; padding-right: 100px;">Galery</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php" style="color: white; font-size: 20px;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php" style="color: white; font-size: 20px;">Album</a>
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
    <h1 style="padding-top: 50px; text-align: center;">Halaman Edit Foto</h1>
    <p style="padding-top: 10px; text-align: center;">Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></p>
    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $fotoid = $_GET['fotoid'];
            $sql = mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data = mysqli_fetch_array($sql)) {
        ?>
       
    <div class="container container-margin mb-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9 bg-light py-3">
                <h5 class="display-6 fw-bold text-center">Edit Foto</h5>
                <form action="update_foto.php" method="post" enctype="multipart/form-data"> 
                <?php
                    $fotoid = $_GET['fotoid'];
                    $sql = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'");
                    while($data = mysqli_fetch_array($sql)) {
                ?>
                    <input type="text" class="form-control mb-2" id="fotoid" name="fotoid" placeholder="klik dan ketik disini..." value="<?= $data['fotoid'] ?>" hidden>
                    <label for="judulfoto">Judul Foto</label>
                    <div class="edit_foto/judul-foto" style="padding-bottom: 10px; padding-top: 40px;">
                <td for="judulfoto" style="display: block; color: white; font-weight: bold; text-align: center;"> </td>
                <input type="text" name="judulfoto" id="judulfoto"  value="<?= $data['judulfoto'] ?>" style="width: 70%; border-radius: 5px;">
              </div>
                    <label for="deskripsifoto">Deskripsi Foto</label>
                    <div class="edit_foto/deskripsi-foto" style="padding-top: 10px;">
                <td for="deskripsifoto" style="display: block; color: white; font-weight: bold; text-align: center;"> </td>
                <input type="text" name="deskripsifoto" id="deskripsifoto" value="<?= $data['deskripsifoto'] ?>" style="width: 70%; border-radius: 5px; margin-left: 8px;">
              </div>
                    <label for="lokasifile" style="display: block;">Foto</label>
                    <img src="gambar/<?= $data['lokasifile'] ?>" alt="<?= $data['judulfoto'] ?>" id="judulfoto" width="200px" class="mb-1">
                    <input type="file" class="form-control mb-2" id="lokasifile" name="lokasifile" placeholder="klik dan ketik disini..." >
                    <label for="albumid">Album</label>
                    <select name="albumid" id="albumid" class="form-control mb-2">
                    <?php
                        $userid = $_SESSION['userid'];
                        $sql2 = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        while($data2 = mysqli_fetch_array($sql2)) {
                    ?>
                        <option value="<?= $data2['albumid'] ?>"<?php if($data2['albumid'] == $data['albumid']){echo 'selected';} ?>><?= $data2['namaalbum'] ?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <input type="submit" value="Ubah" class="btn btn-success">
                    <button type="reset" class="btn btn-danger">Hapus</button>
                    <a href="foto.php" class="btn btn-warning">Kembali</a>
                <?php
                    }
                ?>
                </form>
            </div>
        </div>
    </div>
        <?php
            }
        ?>
    </form>
    <div class="container-fluid fixed-bottom" style="background-color: black; text-align: center;">copyright &copy; ukkrpl2024</div>
</body>
</html>