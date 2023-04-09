<?php
$server='localhost';
$username='root';
$password='';
$database='Craftizen';

$conn= new mysqli($server,$username,$password,$database);

session_start();
$mno=null;
$disp1="none";
$disp2="flex";
if(isset($_SESSION['mno'])){
$mno=$_SESSION['mno'];
$disp1="flex";
$disp2="none";
}
$sql='SELECT * FROM user_info where mobileno="'.$mno.'"';
$r1=$conn->query($sql);
$result=$r1->fetch_all();

$sql3='SELECT * FROM orders_info where order_id="'.$_GET['id'].'"';
$r3=$conn->query($sql3);
$result3=$r3->fetch_all();

$sql4='SELECT * FROM products_cart where mobileno="'.$mno.'"';
$r4=$conn->query($sql4);
$result4=$r4->fetch_all();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Cart - Craftizen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="order_placed.css">
    <link rel="stylesheet" href="stoneart.css">
    <link rel="stylesheet" href="homestyle.css">
    <script>
        function navToHome(){
        window.location.href="home.php";
    }
    function navToTrack(id){
        window.location.href="track.php?id="+id;
    }
    </script>
</head>
<nav class="nav-top" style="background-color:#ffdfb6 ;display: flex;">
    <img src="./Craftizenlogo.JPG" alt="" class="nav-logo">
    <p class="nav-name">CRAFTIZEN</p>
    <div style="display: flex;margin-left: 10px;display:<?php echo $disp1?>">
        <a href="./home.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="home">HOME</p></a>
            <div class="dropdown">
                <button class="nav-btn" style="background: none;border: none;" id="shop">SHOP ▼</button>
                <div class="dropdown-content">
                <a href="stoneart.php">STONE ART</a>
                <a href="./glassart.php">GLASS ART</a>
                <a href="./woodcarving.php">WOOD CARVING</a>
                <a href="./jewellery.php">JEWELLERY</a>
                </div>
              </div>
        <a href="./profile.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="ma">MY PROFILE</p></a>
        <a href="./cart.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="mc">MY CART</p></a>
        <a href="./orders.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="mo">MY ORDERS</p></a>
        <a href="./about.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="au">ABOUT US</p></a>
    </div>
    <div style="display: flex;margin-left: 10px;display:<?php echo $disp2?>">
        <a href="./home.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="home">HOME</p></a>
            <div class="dropdown">
                <button class="nav-btn" style="background: none;border: none;" id="shop">SHOP ▼</button>
                <div class="dropdown-content">
                <a href="login.php">STONE ART</a>
                <a href="login.php">GLASS ART</a>
                <a href="login.php">WOOD CARVING</a>
                <a href="login.php">JEWELLERY</a>
                </div>
              </div>
        <a href="login.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="ma">MY PROFILE</p></a>
        <a href="login.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="mc">MY CART</p></a>
        <a href="login.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="mo">MY ORDERS</p></a>
        <a href="login.php" style="text-decoration: none;color: black;"><p class="nav-btn" id="au">ABOUT US</p></a>
    </div>
    <form action="./search.php" method="POST">
        <input type="text" name="search" class="search-bar">
        <img src="./search-line.png" alt="" class="search-img" style="width: 38px;position: relative;top: -1.5px;right: 43.5px;"><input type="submit" value="" class="search-img-btn"></img>
    </form>
    <?php
    if(isset($_SESSION['mno'])){
        echo '<p class="nav-username"><img src="https://ui-avatars.com/api/?background=ffc556&name='.$result[0][0].'" alt="profile_pic" class="nav-username-img"><span>'.$result[0][0].'</span></p>';
    }
    else{
        echo '<button class="nav-login" onclick="nav()"><span>LOGIN</span></button>';
    }
    ?>
</nav>
<body style="background-color: white;">
    <div class="order-outer-div">
        <h1 class="order-text">Your Order</h1>
        <div class="order-inner-div1">
            <div class="order-head-text">
                <p style="font-weight:bold">Order Number</p>
                <p style="color:#79879A">#<?php echo $result3[0][1]?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Date</p>
                <p style="color:#79879A"><?php echo $result3[0][3]?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Total</p>
                <p style="color:#79879A">₹<?php echo $result3[0][2]?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Shipped To</p>
                <p style="color:#79879A"><?php echo $result[0][0]?></p>
            </div>
            <div class="order-head-text">
                <p style="font-weight:bold">Address</p>
                <p style="color:#79879A"><?php echo $result3[0][5]?></p>
            </div>
            <div class="order-head-text">
                <button onclick="navToHome()">Return To Homepage</button>
            </div>
        </div>
        <div class="order-inner-div2">
            <div class="order-shipping-div">
                <div class="order-green-div">
                    <p class="order-green-head">Shipped</p>
                    <p class="order-green-text">Est. delivery between <?php echo $result3[0][3]?> - <?php echo $result3[0][4]?></p>
                </div>
                <div class="order-green-button">
                    <button onclick="navToTrack(<?php echo $result3[0][1] ?>)">Track Shipment</button>
                </div>
            </div>
            <?php 
            for($i=0;$i<count($result4);$i++){
            echo '<div class="order-prd-div">';
            echo '<img src="'.$result4[$i][3].'.jpg" alt="" class="order-prd-img">';
            echo '<div style="display: block;margin-left:20px;line-height:10px;margin-top:5px">';
            echo '<p style="font-size: 16px;"><b>'.$result4[$i][1].'</b></p>';
            echo '<p><b>Price: </b>₹'.$result4[$i][2].'</p>';
            echo '<p><b>Quantity: </b>'.$result4[$i][4].'</p>';
            echo '</div>';
            echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>