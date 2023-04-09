<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "craftizen";

$conn = new mysqli($servername, $username, $password, $database);

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Craftizen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="stoneart.css">
    <link rel="stylesheet" href="homestyle.css">
    <script>
        function nav() {
            window.location.href = "login.php";
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
    <section id="header" class="jumbotron  text-left text-black">
        <div class="container p-5 ">
          <h1 class="display-5 font-monospace home-text" style="font-size: 52px;font-weight:800;">GET UPTO 10% OFF!</h1>
          <p class="lead home-text" style="font-weight: 500;color:burlywood">Summer sale is now available with free shipping of all your products.</p>
          <hr class="my-4 home-text">
          <p class="home-text">Shop today because limited products available!</p>
        </div>
      </section>


    <div class="container-fluid text-center text-md-left py-4" style="background-color: #a9cfbc;height:72px">
        <div class="row">
            <div class="col-lg-4">
                <p><img src="./truck-fill.png" width=auto height="25" /> Free Shipping Available also</p>
            </div>
            <div class="col-lg-4">
                <p><img src="./lock-fill.png" width=auto height="25" /> 100% Save on your Products</p>
            </div>
            <div class="col-lg-4">
                <p><img src="./truck-fill.png" width=auto height="25" /> No Taxation Available</p>
            </div>
        </div>
    </div>
    <div id="cards" style="max-width: 100vw;">
        <div class="card">
            <img class="card-img-top" src="./stoneart4.jpg" alt="Card image cap">
            <div class="card-body" style="padding: 5px;">
                <h5 class="card-title" style="margin-top: 10px;font-weight:bold;">Stone Art</h5>
                <p class="card-text" style="font-size: 15px;margin-top: 5px;line-height: 22px;">We have a collection of various products made from stones.</p>
                <?php
                if (isset($_SESSION['mno'])) {
                    echo '<a href="./stoneart.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                } else {
                    echo '<a href="./stoneart.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                }
                ?>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhTGpNDAfIijvoBz5GmxTCSergAxuUPkkRnsnmN3Ivk6ffjs49Q-beGsQwZgA2hBz759o&usqp=CAU" alt="Card image cap">
            <div class="card-body" style="padding: 5px;">
                <h5 class="card-title" style="margin-top: 10px;font-weight:bold;">Glass Art</h5>
                <p class="card-text" style="font-size: 15px;margin-top: 5px;line-height: 22px;">We have a collection of various products made from glass.</p>
                <?php
                if (isset($_SESSION['mno'])) {
                    echo '<a href="./glassart.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                } else {
                    echo '<a href="./login.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                }
                ?>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdfT66JtttS1LkVINZDDWFlEKrn3g4Zv53Aw&usqp=CAU" alt="Card image cap">
            <div class="card-body" style="padding: 5px;">
                <h5 class="card-title" style="margin-top: 10px;font-weight:bold;">Wood Carving</h5>
                <p class="card-text" style="font-size: 15px;margin-top: 5px;line-height: 22px;">We have a collection of various products made by carving woods.</p>
                <?php
                if (isset($_SESSION['mno'])) {
                    echo '<a href="./woodcarving.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                } else {
                    echo '<a href="./woodcarving.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                }
                ?>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://www.southtourism.in/assets/images/meenakari-rajasthan.jpg" alt="Card image cap">
            <div class="card-body" style="padding: 5px;">
                <h5 class="card-title" style="margin-top: 10px;font-weight:bold;">Jewellery</h5>
                <p class="card-text" style="font-size: 15px;margin-top: 5px;line-height: 22px;">We have a collection of various jewellery.</p>
                <?php
                if (isset($_SESSION['mno'])) {
                    echo '<a href="./jewellery.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                } else {
                    echo '<a href="./jewellery.php" class="card-btn" style="height: 50px;width:100%;padding:0.6rem 1.25rem;margin-top:0px;">Explore</a>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

<footer class="text-black" style="background-color:#ffdfb6 ;">
    <div class="container text-center text-md-left">
        <div class="row text-center text-md-left">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <img src="./Craftizenlogo.JPG" alt="" style="width:7rem">
                <h5 class="text-uppercase mb-4 font-weight-bold">Craftizen</h5>
                <p style="text-align: justify;">Decorate your home with our decor, paintings and much more. Gifting handcrafted gifts to your loved ones.</p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Products</h5>
                <p>
                    <a href="stoneart.php" class="text-decoration-none text-black">StoneArt</a>
                </p>
                <p>
                    <a href="glassart.php" class="text-decoration-none text-black">Glassart</a>
                </p>
                <p>
                    <a href="woodcarving.php" class="text-decoration-none text-black">WoodCarving</a>
                </p>
                <p>
                    <a href="jewellery.php" class="text-decoration-none text-black">Jewellery</a>
                </p>

            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Useful Links</h5>
                <p>
                    <a href="home.php" class="text-decoration-none text-black">Home</a>
                </p>
                <p>
                    <a href="profile.php" class="text-decoration-none text-black">My Account</a>
                </p>
                <p>
                    <a href="cart.php" class="text-decoration-none text-black">My Cart</a>
                </p>
                <p>
                    <a href="about.php" class="text-decoration-none text-black">About Us</a>
                </p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Contact</h5>
                <p>
                    <a href="#"><img src="home-fill.png" width=auto height="18" /></a>
                    PCE, Panvel, Mumbai
                </p>
                <p>
                    <a href="#"><img src="mail-fill.png" width=auto height="18" /></a>
                    craftizen@gmail.com
                </p>
                <p>
                    <a href="#"><img src="phone-fill.png" width=auto height="18" /></a>
                    +91 8286538250
                </p>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8 lead">
                <p style="font-size: 15px;"> Copyright @2023 All rights reserved by:
                    <a href="#" class="text-uppercase mb-4 font-weight-bold text-decoration-none text-black">Craftizen</a>
                </p>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#"><img src="facebook-circle-fill.png" width=auto height="20"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img src="whatsapp-fill.png" width=auto height="20"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img src="messenger-fill.png" width=auto height="20"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img src="amazon-fill.png" width=auto height="20"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



</footer>

</html>