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




if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
        $message[] = 'product added to cart!';
    }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>PC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Kufam:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
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

    <section class="PC" id="PC">
        <h2 class="title">PC</h2>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div id="message" style="    position: sticky;
            top: 0;
            left: 0;
            right: 0;
            text-align: center;
            color: var(--black);
            font-size: 20px;
            text-transform: capitalize;
            cursor: pointer;" onclick="this.remove();">' . $message . '</div>';
            }
        }
        ?>
        <div class="content">
            <form action="" method="post">
                <input type="hidden" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="images/PC.webp">
                <input type="hidden" name="product_name" value="MSI">
                <input type="hidden" name="product_price" value="499">

                <div class="PC-card">
                    <div class="PC-image">
                        <img src="images/PC.webp" usemap="#workmap">

                    </div>
                    <center class="price2">
                        <h4>499$</h4>
                    </center>

                    <div class="PC-info">
                        <strong class="PC-title">
                            <span>MSI</span>
                            <input class="sub" type="submit" name="add_to_cart" value="ADD TO CART">
                        </strong>

                    </div>

                </div>
            </form>
            <form action="" method="post">
                <input type="hidden" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="images/PC2.jpg">
                <input type="hidden" name="product_name" value="DELL">
                <input type="hidden" name="product_price" value="599">

                <div class="PC-card">
                    <div class="PC-image">
                        <img src="images/PC2.jpg" usemap="#workmap">

                    </div>
                    <center class="price2">
                        <h4>599$</h4>
                    </center>

                    <div class="PC-info">
                        <strong class="PC-title">
                            <span>DELL</span>
                            <input class="sub" type="submit" name="add_to_cart" value="ADD TO CART">

                        </strong>

                    </div>

                </div>
            </form>
            <form action="" method="post">
                <input type="hidden" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="images/PC3.jpeg">
                <input type="hidden" name="product_name" value="ASUS">
                <input type="hidden" name="product_price" value="700">
                <div class="PC-card">
                    <div class="PC-image">
                    <a href="https://elnour-tech.com/ar/product/onikuma-k17-pro-surround-sound-gaming-headset-3d-bass-pc-red/"><img src="images/PC3.jpeg" usemap="#workmap"></a>   
                    
                    </div>
                    <center class="price2">
                        <h4>700$</h4>
                    </center>

                    <div class="PC-info">
                        <strong class="PC-title">
                            <span>ASUS</span>
                            <input class="sub" type="submit" name="add_to_cart" value="ADD TO CART">

                        </strong>

                    </div>

                </div>
            </form>
            <form action="" method="post">
                <input type="hidden" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="images/PC4.jpeg">
                <input type="hidden" name="product_name" value="CORSAIR">
                <input type="hidden" name="product_price" value="349">

                <div class="PC-card">
                    <div class="PC-image">
                        <img src="images/PC4.jpeg" usemap="#workmap">

                    </div>
                    <center class="price2">
                        <h4>349$</h4>
                    </center>

                    <div class="PC-info">
                        <strong class="PC-title">
                            <span>CORSAIR</span>
                            <input class="sub" type="submit" name="add_to_cart" value="ADD TO CART">

                        </strong>

                    </div>

                </div>
            </form>
            <form action="" method="post">
                <input type="hidden" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="images/PC5.jpg">
                <input type="hidden" name="product_name" value="COLLER MASTER">
                <input type="hidden" name="product_price" value="469">

                <div class="PC-card">
                    <div class="PC-image">
                        <img src="images/PC5.jpg" usemap="#workmap">

                    </div>
                    <center class="price2">
                        <h4>469$</h4>
                    </center>

                    <div class="PC-info">
                        <strong class="PC-title">
                            <span>COLLER MASTER</span>
                            <input class="sub" type="submit" name="add_to_cart" value="ADD TO CART">

                        </strong>

                    </div>

                </div>
            </form>
            <form action="" method="post">
                <input type="hidden" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="images/n.pc2.png">
                <input type="hidden" name="product_name" value="Xigmatek">
                <input type="hidden" name="product_price" value="689">

                <div class="PC-card">
                    <div class="PC-image">
                        <img src="images/n.pc2.png" usemap="#workmap">

                    </div>
                    <center class="price2">
                        <h4>689$</h4>
                    </center>

                    <div class="PC-info">
                        <strong class="PC-title">
                            <span>Xigmatek</span>
                            <input class="sub" type="submit" name="add_to_cart" value="ADD TO CART">

                        </strong>

                    </div>

                </div>
            </form>



        </div>
    </section>
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

</body>

</html>