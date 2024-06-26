
<?php
include 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $message = mysqli_real_escape_string($conn, $_POST['textarea']);
    
    $query = "INSERT INTO contact_us (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Kufam:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Contact</title>
</head>
<body>
    <header>
        <a href="index.php" class="logo"><img src="images/logo.png" alt="#"></a>
        <nav class="navigation">
            <a href="PC.php">PC</a>
            <a href="Laptop.php">Laptop</a>
            <a href="Accessories.php">Accessories</a>
            <a href="Contact.php">Contact</a>
            <a href="index.php?logout=<?php echo $user_id; ?>">Logout</a>
            <a href="cart.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <center>
        <h1 class="contactus-header">Contact Us</h1>
        <br>
        <form class="Container-of-all-items" method="post" action="">
            <br><br>
            <div class="labels-and-textFields">
                <label for="Name">Name :</label>
                <input type="text" id="Name" placeholder="Enter your Name" required name="Name">
            </div>
            <br>
            <div class="labels-and-textFields">
                <label for="Email">Email :</label>
                <input type="email" id="Email" placeholder="Enter your Email" required name="Email">
            </div>
            <br>
            <div class="labels-and-textFields">
                <label for="Phone">Phone :</label>
                <input type="tel" id="telephone" placeholder="Enter your Phone" name="Phone">
            </div>
            <br>
            <div>
                <textarea name="textarea" id="textarea" cols="40" rows="20" placeholder="Write Something here ..."></textarea>
            </div>
            <br>
            <div class="submit-button">
                <input type="submit" value="Submit">
            </div>
            <br>
            <br>
        </form>
        <br>
        <div class="line"></div>
        <br><br>
    </center>
    <!--team-->
    <section class="Team">
        <div class="team">
            <h1><span>Team</span></h1>
            <div class="team_box">
                <div class="profile">
                    <img src="images/moh.jpg">
                    <div class="info">
                        <h2 class="name">Mohamed Wael</h2>
                        <p class="bio">221008895</p>
                        <div class="team_icon">
                            <a href="https://www.facebook.com/share/vWVTdwtfb1zTEkxn/?mibextid=ox5AEW"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://github.com/M777WAEL"><i class="fa-brands fa-github"></i></a>
                            <a href="https://www.instagram.com/mohamedtr200?igsh=b2swb2o4c2xuZWd6&utm_source=qr"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <img src="images/yah2.jpg">
                    <div class="info">
                        <h2 class="name">Yahya Mohamed</h2>
                        <p class="bio">221018204</p>
                        <div class="team_icon">
                            <a href="https://www.facebook.com/yahyia.mohamed.35?mibextid=LQQJ4d"><i class="fa-brands fa-facebook-f"></i></a>
                            <i class="fa-brands fa-github"></i></a>
                            <a href="https://www.instagram.com/yehia_moh_offical?igsh=YXBqd3RiM29hZGZ1"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <img src="images/hos.jpg">
                    <div class="info">
                        <h2 class="name">Hosam Saber</h2>
                        <p class="bio">221008624</p>
                        <div class="team_icon">
                            <a href="https://www.facebook.com/profile.php?id=100076455970516&mibextid=LQQJ4d"><i class="fa-brands fa-facebook-f"></i></a>
                            <i class="fa-brands fa-github"></i></a>
                            <a href="https://www.instagram.com/hossam_s.abdelhamed?igsh=N3owOXo4dDlnNHN6"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <p class="footer-title">Done By @ <span>Mohamed Wael & Hosam Saber & Yahya Mohamed</span></p>
    </footer>
</body>
</html>
