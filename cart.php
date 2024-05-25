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


if (isset($_POST['test'])) {
    $message[] = 'the cart will be shipped soon!';
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

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>cart</title>
    <link rel="stylesheet" href="cart.css">

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

    <Section>
        <h2>
            Cart
        </h2>
        <div class="container">


            <div class="shopping-cart">
                <table>
                    <thead>
                        <th>image</th>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total price</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php
                        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                        $grand_total = 0;
                        if (mysqli_num_rows($cart_query) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                                ?>
                                <!-- table row -->
                                <tr>
                                    <td><img src="<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                                    <td><?php echo $fetch_cart['name']; ?></td>
                                    <td>$<?php echo $fetch_cart['price']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                            <input type="number" min="1" name="cart_quantity"
                                                value="<?php echo $fetch_cart['quantity']; ?>">
                                            <input type="submit" name="update_cart" value="update" class="option-btn">
                                        </form>
                                    </td>
                                    <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
                                    <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn">remove</a>
                                    </td>
                                </tr>
                                <?php
                                $grand_total += $sub_total;
                            }
                        } else {
                            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                        }
                        ?>
                        <tr class="table-bottom">
                            <td colspan="4">Grand Total :</td>
                            <td>$<?php echo $grand_total; ?></td>
                            <td><a href="cart.php?delete_all"
                                    class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete
                                    all</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <center>

                <div class="cart-btn">
                    <form method="post">
                        <input class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" type="submit" name="test"
                            value="Proceed to Checkout">
                    </form>
                </div>
            </center>
            <center>
                <?php
                if (isset($message)) {
                    foreach ($message as $message) {
                        echo '<div id="message" style="    position: sticky;
            top: 0;
            left: 0;
            right: 0;
            padding: 15px 10px 0px 10px ;
            text-align: center;
            z-index: 1000;
            color: var(--black);
            font-size: 20px;
            text-transform: capitalize;
            cursor: pointer;" onclick="this.remove();">' . $message . '</div>';
                    }
                }
                ?>

            </center>
        </div>
    </Section>
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