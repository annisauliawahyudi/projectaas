<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">    
  <title>cs</title>
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

    .card{
        margin-left:24rem;
        margin-top:10rem;
      background: linear-gradient(101.88deg, rgba(255, 255, 255, 0.56) 4.05%, rgba(255, 255, 255, 0.56) 48.89%, rgba(255, 255, 255, 0.56) 98.35%);
      color: #4D6D8A;

    }

    .card-body img{
      width:14rem;
      margin-left: 32rem;
      margin-top: -11rem;
      
    }

    .card hr {
      width: 520px;
      left: 26px;
      
      border: 2px solid #8087C6;
      color: #576A80;
    }

    .noko{
      position: absolute;
      width: 30rem;
      height: 7rem;
      left: 0px;
      top: 15rem;
      margin-left: 30px;

      background: #FFFFFF;
      box-shadow: 0px 2px 27px rgba(42, 60, 72, 0.13);
      border-radius: 4px;
      color: #787878; 
    }

    .card-body h2{
      margin-bottom: 2px;
      margin-left: 20px;
    }

    .card-body h5{
      font-weight: 50;
      margin-bottom: 2px;
      margin-left: 20px;
    }

    .no{
      position: absolute;
      width: 300px;
      height: 42.06px;
      left: 30px;
    
      background: #FFFFFF;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
      border-radius: 2px;
    }

    .noko h4{
      margin-top: 20px;
      margin-left: 40px;
      font-size: 20px;
    }

    .no p{
      margin-left: 7px;
      margin-top: 8px;
      font-size: 15px;
    }

    .hub{
      position: absolute;
      width: 130px;
      height: 42.06px;
      left: 20rem;

      background: #373B61;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25), inset 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .kthub{
      position: absolute;
      width: 200px;
      height: 27px;
      text-align: left;
      top: 5px;
      text-decoration: none;

      font-style: normal;
      font-weight: 500;
      font-size: 20px;
      line-height: 27px;

      color: #FFFFFF;
    }
  </style>
</head>
<body>
  <object data="img/map.svg"></object>
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
  
  <div class="card" style="width:50rem; height:25rem;  opacity: 1;">
  <div class="card-body">
    <h2 class="card-title">kotak CS untuk lebih informasi</h2>
    <h2>lebih lanjut</h2>
    <hr>
    <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
    <h5 class="card-text">Bila memiliki masalah, keluhan, </h5>
    <h5>pertanyaan. Silahkan hubungi</h5>
    <h5> nomer beriku</h5>
    <img src="img/orng.png">                            
    <div class="noko">
      <h4>Hubungi CS</h4>
      <div class="no">
        <p>annisaauliawahyudi@smkwikrama.sch.id</p>
      </div>
      <div class="hub">
        <div class="kthub">
        <h5>HUBUNGI</h5>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
