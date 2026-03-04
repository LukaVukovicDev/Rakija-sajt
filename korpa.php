<?php
require_once('app/config/config.php');
require_once "app/classes/User.php";
$user= new User();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="http://fonts.cdnfonts.com/css/sf-pro-display"
      rel="stylesheet"
    />
    <title>Domaca rakija</title>
    <link rel="icon" type="image/x-icon" href="./rakija slika flasa.png" />
    <link rel="stylesheet" href="./csszakorpu.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="mediazakorpu.css" />
  </head>
  <body>
    <nav class="nav-links" id="navLinks">
      <a href="index.php"
        ><img class="logo-slika" src="./logo.png" alt=""
      /></a>
      <i class="fa fa-times" onclick="hideMenu()"></i>

      <ul class="nav-menu">
        <li><a class="nav-link" href="index.php#Pocetna">POČETNA</a></li>
        <li><a class="nav-link" href="index.php#Proizvodi">PROIZVODI</a></li>
        <li><a class="nav-link" href="index.php#Kontakt">KONTAKT</a></li>
        <li><a class="nav-link" href="index.php#Onama">O NAMA</a></li>
        <?php $user= new User(); 
        if(($user->is_logged() && !$user->is_2fa_enabled())  || ($user->is_logged() && $user->is_2fa_enabled() &&  $_SESSION['authenticated'] == true )) : ?>
          <li><a class="nav-link" href="settings.php">PODESAVANJA</a></li>
          <li><a class="nav-link" href="logout.php">LOGOUT</a></li>
          <?php elseif($user->is_logged() && $user->is_2fa_enabled() &&  $_SESSION['authenticated'] == false) : ?>
          <li><a class="nav-link" href="logout.php">LOGOUT</a></li>
          <li><a class="nav-link" href="authentication/index.php">2FA</a></li>
          <?php  elseif(!$user->is_logged()) : ?>
            <li><a class="nav-link" href="register.php">REGISTRACIJA</a></li>
        <li><a class="nav-link" href="login.php">LOGIN</a></li>
          <?php endif; ?>
        <li class="cart"><a class="nav-link" href="korpa.php"><i class="fa-solid fa-basket-shopping"></i><span>0</span></a></li>
      </ul>

      <i class="fa-solid fa-bars" id="hamburger" onclick="showMenu()"></i>
    </nav>

    <section class="tabela-sekcija" id="tabela-id">
      <div class="products-container">
        <div class="product-header">
          <h5 class="product-title">PROIZVOD</h5>
          <h5 class="price">CENA</h5>
          <h5 class="quantity">KOLICINA</h5>
          <h5 class="total">UKUPNO</h5>
        </div>
        <div class="products"></div>
      </div>
    </section>


<a style="position: relative; 
  top: 650px; 
  left: 500px;
  display: inline-block;
  padding: 10px 20px;
  background-color: #0e0e0e; /* Blue background color */
  color: #d0c52fcf;
  border: none;
  border-radius: 5px; /* Rounded corners */
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease; /* Smooth hover effect */
  " href="checkout.php" class="checkb">Checkout</a>
    
    <script src="./jquery-3.6.1.min.js"></script>
    <script src="./script.js"></script>
    <script src="./scriptzamenumobile.js"></script>
  </body>
</html>
