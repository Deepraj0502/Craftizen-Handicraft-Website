<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'Craftizen';

$conn = new mysqli($server, $username, $password, $database);

session_start();
$mno = null;
$disp1 = "none";
$disp2 = "flex";
if (isset($_SESSION['mno'])) {
    $mno = $_SESSION['mno'];
    $disp1 = "flex";
    $disp2 = "none";
}
$sql = 'SELECT * FROM user_info where mobileno="' . $mno . '"';
$r1 = $conn->query($sql);
$result = $r1->fetch_all();

$sql3 = 'SELECT * FROM orders_info where mobileno="' . $mno . '" and order_id='.$_GET['id'].'';
$r3 = $conn->query($sql3);
$result3 = $r3->fetch_all();

$sql4 = 'SELECT * FROM products_cart where mobileno="' . $mno . '"';
$r4 = $conn->query($sql4);
$result4 = $r4->fetch_all();

$date=date("M d, Y");
$comp="";
if($date>$result3[0][3]){
    $comp="completed";
    $loc1="Reached Craftizen Warehouse, Yoganand Society, Ashok Nagar, Yogi Nagar, Borivali, Mumbai, Maharashtra 400091";
}

$comp2="";
if($date>=$result3[0][4]){
    $comp2="completed";
    $loc1="Delivered at ".$result3[0][5];
}

if($date==$result3[0][3]){
    $loc1="Left Craftizen Warehouse, Bakrol Road, near Galaxy Hotel, Ahmedabad, Gujarat - 382210";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <title>Track</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="track.css">
    <link rel="stylesheet" href="stoneart.css">
    <link rel="stylesheet" href="homeStyle.css">
    <link rel="stylesheet" href="order_placed.css">
    <script>
        function navToHome(){
        window.location.href="home.php";
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
        <a href="./home.php" style="text-decoration: none;color: black;">
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
        <img src="./search-line.png" alt="" class="search-img" style="width: 38px;position: relative;top: -1.5px;right: 43.5px;"><input type="submit" value="" class="search-img-btn"></img>
    </form>
    <?php
    if (isset($_SESSION['mno'])) {
        echo '<p class="nav-username"><img src="https://ui-avatars.com/api/?background=ffc556&name=' . $result[0][0] . '" alt="profile_pic" class="nav-username-img"><span>' . $result[0][0] . '</span></p>';
    } else {
        echo '<button class="nav-login" onclick="nav()"><span>LOGIN</span></button>';
    }
    ?>
</nav>

<body>
    <div class="order-outer-div">
        <h1 class="order-text">Your Order</h1>
        <div class="order-inner-div1">
            <div class="order-head-text">
                <p style="font-weight:bold">Order Number</p>
                <p style="color:#79879A">#<?php echo $result3[0][1] ?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Date</p>
                <p style="color:#79879A"><?php echo $result3[0][3] ?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Total</p>
                <p style="color:#79879A">₹<?php echo $result3[0][2] ?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Shipped To</p>
                <p style="color:#79879A"><?php echo $result[0][0] ?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Address</p>
                <p style="color:#79879A"><?php echo $result3[0][5] ?></p>
            </div>
            <div class="order-head-text">
                <button onclick="navToHome()" style="cursor: pointer;">Return To Homepage</button>
            </div>
        </div>
        <div class="order-inner-div2">
            <div class="order-shipping-div">
                <div class="order-green-div" style="width: 100%;">
                    <p class="order-green-head">Shipped</p>
                    <p class="order-green-text">Est. delivery between <?php echo $result3[0][3] ?> - <?php echo $result3[0][4] ?></p>
                </div>
            </div>
            <div class="container" style="width: 100%;margin-right:0">
                <div class="row">
                    <div class="col-12 col-md-10 hh-grayBox pt45 pb20" style="background-color: #f9fafb;">
                        <div class="row justify-content-between">
                            <div class="order-tracking completed">
                                <span class="is-complete"></span>
                                <p>Ordered<br><span><?php echo $result3[0][3] ?></span></p>
                            </div>
                            <div class="order-tracking <?php echo $comp ?>">
                                <span class="is-complete"></span>
                                <p>Shipped<br><span><?php echo date("M d, Y",strtotime($result3[0][3].'+1 days')); ?></span></p>
                            </div>
                            <div class="order-tracking <?php echo $comp2 ?>">
                                <span class="is-complete"></span>
                                <p>Delivered<br><span><?php echo $result3[0][4] ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="font-size: 18px;">
                <p><b>Status: </b><?php echo $loc1 ?></p>
                <p><b>Estimated Delivery Date: </b><?php echo $result3[0][4] ?></p>
                <p><b>Delivery Partner: </b>Bluedart Express</p>
            </div>
        </div>
    </div>
</body>

</html>