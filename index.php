<?php

include 'koneksi.php';

session_start();

if(isset($_SESSION['username'])){
    header("Location: utama.php");
    exit;
}

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM app WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['username'] = $username;
        header("Location: utama.php");
        exit;
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">    
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <object data="img/map.svg" type=""></object>
    <div class="teks">
        <h1 style="font-size: 70px; ">WeLend</h1>
        <h3>peminjaman menjadi lebih mudah</h3>
    </div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4 col-md-6">
                <div class="card" style= "height:34rem; width:25rem;">
                    <div class="card-body" style="padding-bottom:30px;">
                        <img src="img/kata1.png" style="width:20rem; padding:50px;" >
                        <form method="post">
                            <div class="mb-3">
                               <br><label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" style="background:#D9D9D9;" autofocus placeholder="admin@gmail.com" autocomplete="off"  name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    style="background:#D9D9D9;" autofocus placeholder="admin123" autocomplete="off" name="password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" name="submit"
                                    style="background:#525E64; height:40px; width:100px;">MASUK</button>
                                <br>
                                <h7>Hubungi CS jika bermasalah <a href="cs.php">CS</a></h7>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
