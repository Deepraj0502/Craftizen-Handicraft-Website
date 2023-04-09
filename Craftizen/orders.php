<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'Craftizen';

$conn = new mysqli($server, $username, $password, $database);

$sql = 'SELECT * FROM products_info';

$r1 = $conn->query($sql);
$result = $r1->fetch_all();

session_start();
$mno = null;
$disp1 = "none";
$disp2 = "flex";
if (isset($_SESSION['mno'])) {
    $mno = $_SESSION['mno'];
    $disp1 = "flex";
    $disp2 = "none";
}
$sql2 = 'SELECT * FROM user_info where mobileno="' . $mno . '"';
$r2 = $conn->query($sql2);
$result2 = $r2->fetch_all();

$sql3 = 'SELECT * FROM orders_info where mobileno="' . $mno . '"';
$r3 = $conn->query($sql3);
$result3 = $r3->fetch_all();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stone Art - Cratizen</title>
    <link rel="stylesheet" href="./stoneart.css">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="orders.css">
    <script>
        function nav() {
            window.location.href = 'login.html';
        }
    </script>
</head>
<nav class="nav-top" style="background-color:#ffdfb6 ;display: flex;">
    <img src="./Craftizenlogo.JPG" alt="" class="nav-logo">
    <p class="nav-name">CRAFTIZEN</p>
    <div style="display: flex;margin-left: 10px;display:<?php echo $disp1 ?>">
        <a href="./home.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="home">HOME</p>
        </a>
        <div class="dropdown">
            <button class="nav-btn" style="background: none;border: none;" id="shop">SHOP ▼</button>
            <div class="dropdown-content">
                <a href="stoneart.php">STONE ART</a>
                <a href="./glassart.php">GLASS ART</a>
                <a href="./woodcarving.php">WOOD CARVING</a>
                <a href="./jewellery.php">JEWELLERY</a>
            </div>
        </div>
        <a href="./profile.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="ma">MY PROFILE</p>
        </a>
        <a href="./cart.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="mc">MY CART</p>
        </a>
        <a href="./orders.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="mo">MY ORDERS</p>
        </a>
        <a href="./about.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="au">ABOUT US</p>
        </a>
    </div>
    <div style="display: flex;margin-left: 10px;display:<?php echo $disp2 ?>">
        <a href="./home.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="home">HOME</p>
        </a>
        <div class="dropdown">
            <button class="nav-btn" style="background: none;border: none;" id="shop">SHOP ▼</button>
            <div class="dropdown-content">
                <a href="login.php">STONE ART</a>
                <a href="login.php">GLASS ART</a>
                <a href="login.php">WOOD CARVING</a>
                <a href="login.php">JEWELLERY</a>
            </div>
        </div>
        <a href="login.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="ma">MY PROFILE</p>
        </a>
        <a href="login.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="mc">MY CART</p>
        </a>
        <a href="login.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="mo">MY ORDERS</p>
        </a>
        <a href="login.php" style="text-decoration: none;color: black;">
            <p class="nav-btn" id="au">ABOUT US</p>
        </a>
    </div>
    <form action="./search.php" method="POST">
        <input type="text" name="search" class="search-bar">
        <img src="./search-line.png" alt="" class="search-img" style="width: 38px;position: relative;top: 15px;right: 43px;"><input type="submit" value="" class="search-img-btn"></img>
    </form>
    <?php
    if (isset($_SESSION['mno'])) {
        echo '<p class="nav-username"><img src="https://ui-avatars.com/api/?background=ffc556&name=' . $result2[0][0] . '" alt="profile_pic" class="nav-username-img"><span style="position:relative;top:-13px;">' . $result2[0][0] . '</span></p>';
    } else {
        echo '<button class="nav-login" onclick="nav()"><span>LOGIN</span></button>';
    }
    ?>
</nav>

<body style="background-color: #fff4e6;">
    <div class="order-outer-div">
        <?php
        if (count($result3) > 0) {
            echo '<p class="order-head-text">My Orders</p>';
            for ($i = 0; $i < count($result3); $i++) {
                echo '<div class="order-div">';
                echo '<div class="order-inner-div">';
                echo '<div style="display: block;width:65%;">';
                echo '<p style="font-size: 25px;font-family: sans-serif;margin-right: 10px;color:gray"><b style="color:black">Order </b>#' . $result3[$i][1] . '</p>';
                echo '<p style="font-size: 18px;font-family: sans-serif;margin-right: 10px;margin-top: 20px;"><b>Order Date: </b>' . $result3[$i][3] . '</p>';
                echo '<p style="font-size: 18px;font-family: sans-serif;margin-right: 10px;margin-top: 10px;"><b>Estimate Delivery Date: </b>' . $result3[$i][4] . '</p>';
                echo '<p style="font-size: 18px;font-family: sans-serif;margin-right: 10px;margin-top: 10px;"><b>Order Amount: </b>₹' . $result3[$i][2] . '</p>';
                echo '<p style="font-size: 18px;font-family: sans-serif;margin-right: 10px;margin-top: 10px;"><b>Payment Method: </b>Cash On Delivery</p>';
                echo '</div>';
                echo '<a class="order-track-btn" href="track.php?id=' . $result3[$i][1] . '">Track Order</a>';
                echo '<a class="order-cancel-btn" href="cancel.php?id=' . $result3[$i][1] . '">Cancel Order</a>';
                echo '</div>';
                echo '</div>';
            }
        }
        else{
            echo "<div class='no-order-outer'>";
            echo "<div class='no-order-left'>";
            echo "<h1>NO ORDERS FOUND</h1>";
            echo "<p>Looks like you haven't made your choice yet...</p>";
            echo "<a href='home.php'>Go Shopping</a>";
            echo "</div>";
            echo "<img src='no-order.png' alt='' class='no-order-img'>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>