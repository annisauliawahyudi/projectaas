<?php
include 'koneksi.php';

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}
     
$conn = mysqli_connect("localhost", "root", "", "dlogin");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT  rayon, rombel, nis FROM app WHERE id ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $rayon = $row['rayon'];
    $rombel = $row['rombel'];
    $nis = $row['nis'];
} else {
    $nama = "Data tidak ditemukan";
    $keterangan = "";
}



mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
  <title>utama</title>
  <style>
  
    body {
      background-color: #1E90FF;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    object {
      position: fixed;
      top: -130px;
      right: 0px;
      width: calc(100% - 240px);
      height: 100%;
      z-index: -1;
    }

    nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 240px;
      height: 100vh;
      background-color: #FFFFFF;
      z-index: 1;
      padding: 20px;
      transition: transform 0.3s ease;
    }

    nav ul {
      margin-top: 200px;
    }

    nav object {
      height: 100px;
      margin-top: 200px;
      margin-right: 41rem;
    }

    .kotak {
      background-color: #F5F8FA;
      width: 100%;
      height: 26rem;
      margin-bottom: 0;
      padding-top: 2rem;
      position: absolute;
      bottom: 0;
      left: 0; 
    }

    .kotak h1 {
      margin-left: 17rem;
      color: #576A80;
    }

    .judul {
      color: #FFFFFF;
      margin-left: 17rem;
      margin-top: 3rem;
    }
    
    .judul h1 {
      font-size: 60px;
    }

    .judul p {
      margin-top: 10px;
      font-size: 25px;
      margin-bottom: -20px;
    }

    .kotak hr {
      position: absolute;
      width: 972.03px;
      
      left: 262px;
      top: 90px;
      border: 3.9px solid #717A9A;
      color: #576A80;
    }


    .we img {
      width: 100px;
      height: auto;
      margin-right: 10px;
    }

    .we {
      display: flex;
      justify-content: center;
      align-items: flex-start;
     
    }

    
  </style>
</head>
<body>
  <object data="img/map.svg"></object>

  <div class="judul">
    <p>Selamat datang</p>
    <h1><?php echo $_SESSION['username']; ?></h1>
    <h4><?php echo "$rayon - $rombel - $nis" ?></h4>
  </div>

  <nav>
    <object data="img/pp.svg"></object>
    <ul class="nav flex-colum">
      <li class="nav-item">
        <a class="nav-link" href="utama.php"><img src="img/home.png" style="display: inline-block; margin-right:10px; ">UTAMA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pengembalian.php"><img src="img/kotak.png" style="display: inline-block; margin-right:10px;">PENGEMBALIAN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cs.php"><img src="img/tlp.png" style="display: inline-block; margin-right:10px;">CONTACT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
    </ul>
  </nav>
  <div class="kotak">
    <h1>Pinjam apa hari ini?</h1>
    <hr>
    <div class="gamabar" style="padding-left:16rem; display: flex;">
      <div class="we">
        <a href="pinjamLenovo.php">
          <img src="img/lenovo.png" style="width:200px; margin-top:2rem; margin-right: -15rem;"></a>
        <div style="margin:70px; padding-top: 2px;">
          <img src="img/katalen.png">
        </div>
        <a href="pinjamAcer.php">
          <img src="img/acer.png" style="width:200px; margin-top:2rem; margin-right: -15rem;"></a>
          <div style="margin:70px; padding-top: 1px;">
          <img src="img/kataa.png">
        </div>
        <a href="pinjamhp.php">
          <img src="img/hps.png" style="width:200px; margin-top:2rem; margin-right: -15rem;"></a>
          <div style="margin:80px; padding-top: 1px; width: 90px;">
          <img src="img/HP.png">
        </div>
        <a href="">
          <img src="img/acer.png" style="width:200px; margin-top:2rem; margin-right: -15rem;"></a>
          <div style="margin:70px; padding-top: 1px;">
          <img src="img/katalai.png">
        </div>
      </div>
    </div>
  </div>
</body>
</html>
