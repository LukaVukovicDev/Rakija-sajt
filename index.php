<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once('app/classes/User.php');
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Domaca rakija,rakija,rakija Domaca,rakija domaca, sljivovica">
  <meta name="author" content="Luka Vukovic">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="http://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">               
  <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
  <title>Domaca rakija</title>
  <link rel="icon" type="image/x-icon" href="./rakija slika flasa.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="media.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
  <div class="container">
    <nav class="nav-links" id="navLinks">
      <a href="#Onama"><img class="logo-slika" src="./logo.png" alt=""></a>
      <i class="fa fa-times" onclick="hideMenu()"></i>
      
     <ul class="nav-menu">
        <li><a class="nav-link" href="#Pocetna">POČETNA</a></li>
        <li><a class="nav-link" href="#Proizvodi">PROIZVODI</a></li>
        <li><a class="nav-link" href="#Kontakt">KONTAKT</a></li>
        <li><a class="nav-link" href="#Onama">O NAMA</a></li>
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
    <section class="one" id="Pocetna">
      <div class="text-div">
        <h1 class="dobrodosli">Domaća rakija</h1>
        <p>Domaći, provereno dobar recept Šumadijskog čaja</p>
        <a href="#Proizvodi" class="proizvodi-btn">PROIZVODI</a>
        <a href="#Kontakt" class="kontakt-btn">KONTAKT</a>
      </div>
    </section>


    <section class="proizvodi" id="Proizvodi">
      <div class="glavi-proizvodi">
        <div class="naslov">
          <h1 class="naslov-1">Proizvodi</h1>
         </div>
      <div class="container2">
        
      <div class="card-box">
      <div class="card">
        <img src="./slike rakije/sljivovica.jpg" alt="" class="card-img">
        <div class="content">
            <h2>Šljivovica</h2>
            <p>Sljivovica je rakija koja se najvise konzumira. Mi proizvodimo sljivovicu od crvenjace, najbolje sorte sljive za rakiju. </p>
             <a href="#Proizvodi" class="more" onclick="showText('details-id')">Kupi</a>
        </div>
        </div>
        <div class="card">
          <img src="./slike rakije/dunja.jpg" alt="" class="card-img">
          <div class="content">
              <h2>Dunja</h2>
              <p>Dunja predstavlja varijaciju sljivovice uz dodatak dunje. Za sve ljubitelje arome dunje. </p>
               <a href="#Proizvodi" class="more" onclick="showText('details-id2')">Kupi</a>
          </div>
          
      </div>
      <div class="card">
        <img src="./slike rakije/orahovaca.jpg" alt="" class="card-img">
        <div class="content">
            <h2>Orahovača</h2>
            <p>Orahovaca je specijalitet za koji treba najvise truda. Retko kada je imamo u prodaji jer je proizvodnja spora da bi kvalitet bio na mestu. </p>
             <a href="#Proizvodi" class="more" onclick="showText('details-id3')">Kupi</a>
        </div>
    </div>
    <div class="details" id="details-id">
      <div class="details-card" >
        <img src="./slike rakije/sljivovica.jpg" alt="">
        <div class="info">
          <h2>Šljivovica</h2>
          <p>Sljivovica je rakija koja se najvise konzumira. Mi proizvodimo sljivovicu od crvenjace, najbolje sorte sljive za rakiju. </p>
        <button class="dodaj-u-korpu">DODAJ U KORPU</button>
        <div class="dostupnost-class">
          <span class="dot"></span>
          <p>Proizvod je dostupan</p>
        </div>
      </div>
        <i class="icon-close fa-solid fa-xmark" onclick="hideText('details-id')"></i>
      </div>
    </div>
    <div class="details" id="details-id2">
      <div class="details-card" >
        <img src="./slike rakije/dunja.jpg" alt="">
        <div class="info">
          <h2>Dunja</h2>
          <p>Dunja predstavlja varijaciju sljivovice uz dodatak dunje. Za sve ljubitelje arome dunje. </p>
          <button class="dodaj-u-korpu">DODAJ U KORPU</button>
          <div class="dostupnost-class">
            <span class="dot"></span>
            <p>Proizvod je dostupan</p>
          </div>
        </div>
        <i class="icon-close fa-solid fa-xmark" onclick="hideText('details-id2')"></i>
      </div>
    </div>
    <div class="details" id="details-id3">
      <div class="details-card" >
        <img src="./slike rakije/orahovaca.jpg" alt="">
        <div class="info">
          <h2>Orahovača</h2>
          <p>Orahovača je specijalitet za koji treba najviše truda. Retko kada je imamo u prodaji jer je proizvodnja spora da bi kvalitet bio na mestu. </p>
        </div>
        <i class="icon-close fa-solid fa-xmark" onclick="hideText('details-id3')"></i>
        <button class="dodaj-u-korpu">DODAJ U KORPU</button>
        <div class="dostupnost-class">
          <span class="dot"></span>
          <p>Proizvod je dostupan</p>
        </div>
      </div>
    </div>

      </div>
    </section>




    <section class="kontakt" id="Kontakt">
      <div id="googlemaps"></div>
      <div class="sve-ostalo">
      <div class="kontent">
        <h1 style="color: white;">Kontakt</h1>
        <p class="p-kontakti">Za sve dodatne informacije i nesuglasice mozete nas kontaktirati preko dole ponudjenih kontakata</p>
      </div>
        <div class="kontejner">
          <div class="contactInfo">
<div class="box">
  <div class="icon">
    <i class="fa-solid fa-location-dot"></i>
  </div>
  <div class="text">
    <h3>Adresa</h3>
    <p>Banja bb</p>
  </div>
  
 

</div>
<div class="box">
  <div class="icon">
    <i class="fa-sharp fa-solid fa-phone"></i>
  </div>
  <div class="text">
    <h3>Broj telefona</h3>
      <p>064</p>
  </div>
      

</div>
<div class="box">
  <div class="icon">
    <i class="fa-solid fa-envelope"></i>
  </div>
  <div class="text">
    <h3>Email</h3>
  <p>luka.vukovic288@gmail.com</p>
    </div>
  </div>
</div>

        
       
        
  
      
      
    <div class="contactForm">
        <form action="sendmail.php" method="post">
          <h2 style="color: black;">Pošalji poruku</h2>
        <div class="inputbox">
          <input type="text" name="imeprezime" required="required" placeholder="Ime i Prezime">
         
        </div>
        <div class="inputbox">
          <input type="email" name="email" required="required" placeholder="Email">
          
        </div>
        <div class="inputbox">
          <input type="text" name="brtelefona" required="required" placeholder="Broj telefona">
         
        </div>
        <div class="inputbox">
          <textarea class="textarea" name="poruka" required="required" name="" id="" cols="30" rows="10" placeholder="Napisi poruku..."></textarea>
         
        </div>
         
        <div class="inputbox">
          <button class="dugme-posalji" type="submit">Posalji</button>
          
          
         </div>
        </form>
      </div>
    </div>
    </div>
  </section>

    <section class="onama" id="Onama">
      <div class="o-nama-glavni" style="height: 100%; display:flex; flex-direction:column">
        <h1 style="margin-top: 10%;">O nama</h1>
        <div class="div-o-nama">
        <div class="o-nama-div">
        <img src="./ruke.png" alt="">
        <h2>Tradicija koja se prenosi</h2>
        <p>Tradicija pravljenja rakije se prenosi sa kolena na koleno već više vekova.</p>
        </div>
        <div class="o-nama-div" >
        <img src="./rakija-od-sljive-7.jpg" alt="">
        <h2>Pečenje rakije</h2>
        <p>Da se nauči pečenje rakije najbolje je u praksi, zbog toga mi pravimo najbolju rakiju.</p>
        </div>
        <div class="o-nama-div">
        <img src="JumboLightning-PhotoRoom.jpg" alt="">
        <h2>Viševekovni recept</h2>
        <p>Provereno dobar recept koji zadovoljava guše već više vekova.</p>
        </div>
        </div>

      </div>
     

      
    </section>



    <section class="footer-sekcija">
      <footer class="footer">
        <div class="footer-container">
          <div class="row">
            <div class="footer-col">
            <h4>Kontakt</h4>
            <ul>
            <li><a href="#Kontakt">broj telefona</a></li>
            <li><a href="#Kontakt">elektronska pošta</a></li>
            
            </ul>
            </div>
            <div class="footer-col">
              <h4>O nama</h4>
              <ul>
                <li><a href="#Kontakt">lokacija</a></li>

           
              </ul>
            </div>
            <div class="footer-col">
             <h4>Dotatna pomoc</h4>
             <ul>
              <li><a href="#">kako naruciti proizvod preko sajta</a></li>
            
             </ul>
            </div>
            <div class="footer-col">
              <h4>Zaprati nas</h4>
              <div class="social-links">
                <a href="https://sr-rs.facebook.com/" ><i class="fa-brands fa-facebook" class="follow-links"></i></a>
                <a href="https://twitter.com/?lang=sr"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://rs.linkedin.com/?original_referer=https%3A%2F%2Fwww.google.com%2F"><i class="fa-brands fa-linkedin"></i></a>
    
              </div>
              </div>
    
          </div>
        </div>
        <br>
    <hr style="width: 80%;margin-left:10%; margin-top: 1%;">
    <h4 class="kopirajt" style="color: rgb(255, 255, 255); text-align: center; margin-top: 2%;  white-space: nowrap;">Copyright © 2023 Domaca rakija Vuković All Rights Reserved.</h4>
      </footer>
    </section>
  </div>

  <script src="./jquery-3.6.1.min.js"></script>
  <script src="./script.js"></script>
  <script src="./scriptzamenumobile.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript">

    // The latitude and longitude of your business / place
    var position = [44.30374939558679, 20.569658369628183];
    
    function showGoogleMaps() {
    
        var latLng = new google.maps.LatLng(position[0], position[1]);
    
        var mapOptions = {
            zoom: 16, // initialize zoom level - the max value is 21
            streetViewControl: false, // hide the yellow Street View pegman
            scaleControl: true, // allow users to zoom the Google Map
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: latLng
        };
    
        map = new google.maps.Map(document.getElementById('googlemaps'),
            mapOptions);
    
        // Show the default red marker at the location
        marker = new google.maps.Marker({
            position: latLng,
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP
        });
    }
    
    google.maps.event.addDomListener(window, 'load', showGoogleMaps);
    </script>
  
</body>

</html>