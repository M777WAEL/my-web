<?php

include 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
}
;

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:login.php');
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="clock.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Kufam:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">


  <title>SEGMA TECH</title>
</head>

<body>

  <header>
    <a href="index.php" class="logo"><img src="images/logo.png" alt="#"></a>
    <nav class="navigation">
      <a href="#Sections">Sections</a>
      <a href="PC.php">PC</a>
      <a href="Laptop.php">Laptop</a>
      <a href="Accessories.php">Accessories</a>
      <a href="Contact.php">Contact</a>
      <a href="index.php?logout=<?php echo $user_id; ?>">Logout</a>
      <a href="cart.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>

    </nav>
  </header>

  <!--al main-->
  <section class="main">
    <div>
      <h2>Welcome Customers<br><span>Computer World</span></h2>
      <h3>All Computer and Laptop Belongings</h3>
      <a href="#Sections" class="main-btn">Shop Now</a>
      <div class="social-icons">
        <a href="https://www.facebook.com/share/vWVTdwtfb1zTEkxn/?mibextid=ox5AEW"><i
            class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.tiktok.com/@h_saber7?_t=8kuG9cuG5Yr&_r=1"><i class="fa-brands fa-tiktok"></i></a>
        <a href="https://www.instagram.com/yehia_moh_offical?igsh=YXBqd3RiM29hZGZ1"><i
            class="fa-brands fa-instagram"></i></a>
        <a href="https://github.com/Jazzmedo"><i class="fa-brands fa-github"></i></a>

      </div>
    </div>

  </section>

  <!--card sec-->
  <section class="cards" id="Sections">
    <h2 class="title">Sections</h2>
    <div class="content">
      <div class="card">

        <div class="icon">
          <a href="Accessories.php"><i class="fa-solid fa-computer-mouse" style="color: #ff0000;"></i></a>
        </div>
        <div class="info">
          <h3>Accessories</h3>
        </div>

      </div>
      <div class="card">
        <div class="icon">
          <a href="PC.php"><i class="fa-solid fa-computer" style="color: #ff0000;"></i></a>
        </div>
        <div class="info">
          <h3>PC</h3>

        </div>

      </div>
      <div class="card">
        <div class="icon">
          <a href="Laptop.php"><i class="fa-solid fa-laptop" style="color: #ff0000;"></i></a><i class=></i>
        </div>
        <div class="info">
          <h3>Laptop</h3>
        </div>


    </div>


      <!--clock-->
  <section class="clock">
    <div class="hero">
      <div class="container">
        <div class="clock">
             <span id="hrs">00</span>
             <span>:</span>
             <span id="min">00</span>
             <span>:</span>
             <span id="sec">00</span>

    </div>
      </div>
        </div>

  </section>



    <!--table-->
  </section>
  <h1 id="tablehhh">Opening Times</h1>
  <div class="schedule-table-container">
    <table class="schedule-table">
      <thead>
        <tr>
          <th>Day</th>
          <th>Opening Time</th>
          <th>Closing Time</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Saturday</td>
          <td>9:00 AM</td>
          <td>6:00 PM</td>
        </tr>
        <tr>
          <td>Sunday</td>
          <td>9:00 AM</td>
          <td>6:00 PM</td>
        </tr>
        <tr>
          <td>Monday</td>
          <td>9:00 AM</td>
          <td>6:00 PM</td>
        </tr>
        <tr>
          <td>Thuesday</td>
          <td>9:00 AM</td>
          <td>6:00 PM</td>
        </tr>
        <tr>
          <td>Wednesday</td>
          <td>10:00 AM</td>
          <td>10:00 PM</td>

        </tr>
        <tr>
          <td>Thursday</td>
          <td>10:00 AM</td>
          <td>4:00 PM</td>
        </tr>
        <tr>
          <td>Friday</td>
          <td>Close</td>
          <td>Close</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!--footer-->

  <footer class="footer">
    <p class="footer-title">Done By @ <span>Mohamed Wael & Hosam Saber & Yahya Mohamed</span></p>
    <div class="social-icons">
      <a href="https://www.facebook.com/share/vWVTdwtfb1zTEkxn/?mibextid=ox5AEW"><i
          class="fa-brands fa-facebook-f"></i></a>
      <a href="https://www.tiktok.com/@h_saber7?_t=8kuG9cuG5Yr&_r=1"><i class="fa-brands fa-tiktok"></i></a>
      <a href="https://www.instagram.com/yehia_moh_offical?igsh=YXBqd3RiM29hZGZ1"><i
          class="fa-brands fa-instagram"></i></a>
      <a href="https://github.com/Jazzmedo"><i class="fa-brands fa-github"></i></a>

    </div>
  </footer>

  <script>
    let hrs = document.getElementById("hrs");
    let min = document.getElementById("min");
    let sec = document.getElementById("sec");

    setInterval(() => {
      let currentTime = new Date();
 

     hrs.innerHTML = (currentTime.getHours()<10?"0":"") + currentTime.getHours();
     min.innerHTML = (currentTime.getMinutes()<10?"0":"") + currentTime.getMinutes();
     sec.innerHTML = (currentTime.getSeconds()<10?"0":"") + currentTime.getSeconds();
      
    }, 1000)

    let currentTime = new Date();


    hrs.innerHTML = currentTime.getHours();
    min.innerHTML = currentTime.getMinutes();
    sec.innerHTML = currentTime.getSeconds();
  </script>  


</body>

</html>