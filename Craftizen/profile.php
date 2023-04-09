<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="craftizen";

$conn = new mysqli($servername, $username, $password,$database);

session_start();
$date=date("y-m-d");
$mob=$_SESSION["mno"];

$sql1=$conn->query("select * from user_info where mobileno=".$mob.";");
$data=$sql1->fetch_all();

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="homestyle.css">
</head>
<link rel="stylesheet" href="profile.css">
<link rel="stylesheet" href="stoneart.css">
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
        <img src="./search-line.png" alt="" class="search-img" style="width: 38px;position: relative;top: 15px;right: 43px;"><input type="submit" value="" class="search-img-btn"></img>
    </form>
    <?php
    if(isset($_SESSION['mno'])){
        echo '<p class="nav-username"><img src="https://ui-avatars.com/api/?background=ffc556&name='.$result[0][0].'" alt="profile_pic" class="nav-username-img"><span style="position:relative;top:-13px;">'.$result[0][0].'</span></p>';
    }
    else{
        echo '<button class="nav-login" onclick="nav()"><span>LOGIN</span></button>';
    }
    ?>
</nav>
<body>
    <div class="box">
        <img src="https://ui-avatars.com/api/?background=ffc556&name=<?php echo $data[0][0];?>" alt="profile_pic" class="name-logo">
        <h1 id="n1">Name</h1>
        <p id="n2"><?php echo $data[0][0] ?></p>
        <h1 id="g1">Email Id</h1>
        <p id="g2"><?php echo $data[0][3] ?></p>
        <h1 id="c1">Mobile Number</h1>
        <p id="c2"><?php echo $data[0][2] ?></p>
        <h1 id="a1">Address</h1>
        <p id="a2"><?php echo $data[0][4] ?></p>
        <a href="./login.php"><button class="profile-btn"> Logout</button></a>
    </div>
</body>
</html>