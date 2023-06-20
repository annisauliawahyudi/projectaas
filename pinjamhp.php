<?php
session_start();
require_once "koneksi_mysql.php";

if(!isset($_SESSION['username'])) {
    header("Location: utama.php");
}

$sql = "SELECT * FROM hp WHERE status = 'tersedia'";
    $result = mysqli_query($server, $sql);
    $jumlahA = mysqli_num_rows($result);
    $sqli = "SELECT * FROM hp WHERE status = 'dipinjam'";
    $resul = mysqli_query($server, $sqli);
    $jumlahI = mysqli_num_rows($resul);

// Daftar barang yang tersedia
$sql = "SELECT * FROM hp";
$result = mysqli_query($server, $sql);
$barangTersedia = [];
while ($row = mysqli_fetch_assoc($result)) {
    $barangTersedia[$row['no_barang']] = [
        'nama_barang' => $row['nama_barang'],
        'status' => $row['status']
    ];
}

// Cek jika sudah ada data peminjaman
if (!isset($_SESSION['peminjaman'])) {
    $_SESSION['peminjaman'] = [];
}

// Proses peminjaman barang
if (isset($_POST['pinjam'])) {
    $kodeBarang = $_POST['barang'];

    // Cek apakah barang sedang dipinjam atau tidak
    if (in_array($kodeBarang, $_SESSION['peminjaman'])) {
        $error = "Barang sedang dipinjam. Harap kembalikan terlebih dahulu.";
    } else {
        // Update status barang menjadi "dipinjam" di database
        $sql = "UPDATE hp SET status = 'dipinjam' WHERE no_barang = '$kodeBarang'";
        mysqli_query($server, $sql);

        $_SESSION['peminjaman'][] = $kodeBarang;
        $success = "Barang berhasil dipinjam.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">    
  <title>peminjaman</title>
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
      padding: 1rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      grid-gap: 10px;
    }

    .kotak h1 {
      margin-left: 17rem;
      color: #576A80;
    }

    .judul {
      color: #FFFFFF;
      margin-left: 20rem;
      margin-top: 7rem;
    }
    
    .judul h1 {
      font-size: 70px;
    }

    .judul p {
      margin-top: 10px;
      font-size: 25px;
      margin-bottom: -20px;
    }

    hr {
      position: absolute;
      width: 30rem;
      
      left: 20px;
      top: 90px;
      border: 2px solid #6094E2;
    }

    .we {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #F5F8FA;
      padding: 0.7rem;

    }

    .we img {
      width: 100px;
      height: auto;
      margin-right: 10px;
    }

    
    .card {
      width: 190px;
      height: 170px;
      background: #FFFFFF;
      box-shadow: 0px 10px 30px rgba(0, 163, 255, 0.05), 0px 2px 40px rgba(0, 117, 255, 0.1);
      border-radius: 8px;
      
    }

    .status{
      
      padding-top: 7rem;
      padding-left: 14px;


      font-style: normal;
      font-weight: 300;
      font-size: 18px;
      line-height: 27px;
      color: #787878;

    }

    .card:hover {
      cursor: pointer;
      box-shadow: 0px 10px 30px rgba(0, 163, 255, 0.1), 0px 2px 40px rgba(0, 117, 255, 0.2);
    }

    .card .image-container img {
      width: 60px;
      height: auto;
      margin-right: 10px;
    }

    .card .status {
      font-size: 15px;
      color: #576A80;
      margin-top: 0;
    }



      .modal {
      display: none; /* Hide the modal by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      color: #6094E2;
    }

    .modal-content .p{
        padding-left: 90px;
        margin-top: -70px;
        font-size: 20px;
    }

    /* The Close Button */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    .jotas{
      position: absolute;
      width: 124.3px;
      height: 107.96px;
      left: calc(50% - 124.3px/2 + 359.56px);
      bottom: 29rem;

      background: #7FE9D6;
      border-radius: 8px;
    }

    .metas{
      position: absolute;
      width: 124.3px;
      height: 107.96px;
      left: calc(50% - 124.3px/2 + 497.85px);
      bottom: 29rem;

      background: #EA7A7A;
      border-radius: 8px;
    }


    
    input{
      height: 10rem; background:#FFFFFF; margin-top: 15px
    }

  </style>
</head>
<body>
  <object data="img/map.svg"></object>

  <div class="judul">
    <h1>HP</h1>
  </div>
  <div class="kotas">
    <div class="jotas">
      <center>
      <h1><?= $jumlahA ?></h1>
      <p>available</p>
      </center>
    </div>
    <div class="metas">
      <center>
      <h1><?= $jumlahI ?></h1>
      <p>In - use</p>
      </center>
    </div>
  </div>

  <nav>
    <object data="img/pp.svg"></object>
    <ul class="nav flex-colum">
      <li class="nav-item">
        <a class="nav-link" href="utama.php"><img src="img/home.png" style="display: inline-block; margin-right:10px; ">UTAMA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><img src="img/kotak.png" style="display: inline-block; margin-right:10px;">PENGEMBALIAN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cs.php"><img src="img/tlp.png" style="display: inline-block; margin-right:10px;">CONTACT</a>
      </li>
    </ul>
  </nav>
  <div class="kotak">
  <div class="we" style="padding-left: 17rem; padding-right: 2rem;">
    <div class="row justify-content-end">
      <?php foreach ($barangTersedia as $kode => $barang) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4" style="flex: 0 0 25%; max-width: 25%;">
          <div class="card" onclick="openModal('modal')" style="padding-left: -10px;">
            <div class="image-container <?php echo ($barang['status'] == 'dipinjam') ? 'dipinjam' : ''; ?>">
              <img src="img/phone.png" style="position: absolute; left: 34.67%; right: 34.17%; top: 25.15%; bottom: 45.61%;">
            </div>
            <div class="status">
              <p>no hp: <span style="padding-left: 3rem;"><?php echo $barang['nama_barang']; ?></span></p>
              <p style="margin-top: -20px;">Status: <span style="padding-left: 3rem;"><?php echo ($barang['status'] == 'tersedia') ? 'Tersedia' : 'Dipinjam'; ?></span></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>


      <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal')">&times;</span>
            <h2>konfirmasi peminjaman</h2>
            <hr>
            <img src="img/phone.png" style="width: 60px; height: auto; margin-top: 30px;"> 
            <div class="p">
          <p>Hp</p>
          <p style="margin-top: -20px;">tanggal : <?php echo date("d-M-Y");?></p>
        </div>
            <form method="post">
                <select name="barang">
                   <?php foreach ($barangTersedia as $kode => $barang) { ?>
                        <option value="<?php echo $kode; ?>" <?php echo ($barang['status'] == 'dipinjam') ? 'disabled' : ''; ?>>
                            <?php echo $barang['nama_barang']; ?>
                        </option>
                    <?php } ?>
                </select>
                <button id="submitBtn" class="btn btn-primary" type="submit" name="pinjam" style="background:#FFFFFF; height:35px; width:100px; margin-top: 13px; color: #7394C6;">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function toggleNavbar() {
            const navbar = document.querySelector('.navbar');
            navbar.classList.toggle('closed');
        }

        const modal = document.getElementById('myModal');
        const modalImg = document.getElementById('modalImg');
        const closeBtn = document.getElementsByClassName('close')[0];

        // Fungsi untuk membuka modal
        function openModal(imgSrc) {
            modal.style.display = 'block';
            modalImg.src = imgSrc;
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            modal.style.display = 'none';
            modalImg.src = '';
        }

        // Menambahkan event listener pada gambar di dalam .image-container
        const imageContainers = document.querySelectorAll('.image-container');
        imageContainers.forEach(function (container) {
            container.addEventListener('click', function () {
                const imgSrc = this.querySelector('img').src;
                openModal(imgSrc);
            });
        });

        // Menambahkan event listener pada tombol close
        closeBtn.addEventListener('click', closeModal);
    </script>
</body>
</html>
