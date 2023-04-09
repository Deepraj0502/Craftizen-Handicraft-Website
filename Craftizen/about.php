<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="craftizen";

$conn = new mysqli($servername, $username, $password,$database);

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About Us - Craftizen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="homestyle.css">
  <link rel="stylesheet" href="stoneart.css"> 
  <style>
  .sub-body{
    margin: 0 !important;
    padding: 0px !important;
    padding-left: 10px !important;
  }
  </style>
</head>
<nav class="nav-top" style="background-color:#ffdfb6 ;display: flex;margin-left:-10px;width:100vw;">
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
        <img src="./search-line.png" alt="" class="search-img" style="width: 38px;position: relative;top: -1.5px;right: 43px;"><input type="submit" value="" class="search-img-btn"></img>
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
<body  class="container" style="background-color: #fff4e6;max-width:100vw;" >
    <div class="sub-body">
  <h1 class="text-center pt-lg-5 text-uppercase">About Us</h1>
  <img src="./Craftizenlogo.JPG" alt="" style="margin-left: 35vw;width: 25rem;">
  <h2 class="">Introduction</h2>
  <p>
 
      <p style="font-family: Arial, Helvetica, sans-serif; ">Handicrafts are where activity involving the making of decorative domestic or other objects by hand.
      To bring your home to life , you need decor with outstanding pieces of craftmanship and 
      art you can see and feel . Decorate your home with our decor , paintings etc.
      Gifting handcrafted gifts to your loved ones is the latest trend as it shows the effort of the artisans and also
      says a lot about the country.
      We have collection of more than 4000+ handmade bags & showpieces , 1500+ necklaces , 2000+ earrings , 500+ wall clocks and many more decoratives.
      </p>
    <br>

  </p>
  <br>

  <div class="resimage">
      <div style="display: flex;justify-content: space-evenly;background-color: transparent;margin-left: 0;margin-top: -5px;margin-bottom: -0px;">
        <img src="https://m.media-amazon.com/images/I/81-jawAE6LL._SY679_.jpg" height="200" width="200" style="border: 2px solid;"/>
        <img src="https://i.pinimg.com/736x/e5/be/83/e5be83caeb099e936231dcde06c00527.jpg" height="200" width="200" style="border: 2px solid;"/>
        <img src="https://m.media-amazon.com/images/I/51onNgNNgcL._SY450_.jpg" height="200" width="200" style="border: 2px solid;"/>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdB-HBu_R7wGPNJWIr_3Se7eG8bHY9hh89_Q&usqp=CAU" height="200" width="200" style="border: 2px solid;"/>
        <img src="https://m.media-amazon.com/images/I/71NXKpATVvL._SX425_.jpg" height="200" width="200" style="border: 2px solid;"/>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRr0VMOJRFjAh2Fl6hycZkHZKPu2nIA-EODAg&usqp=CAU" height="200" width="200" style="border: 2px solid;"/>
    </div>
  </div>
  <p id="para1">A perfect gift for all ages !</p>
  <p>
    <h2 style="font-family: Arial, Helvetica, sans-serif" class="sticky">Why Us?</h2>
   
    <ul  style="font-family: Arial, Helvetica, sans-serif;" class="a">
    
        <li>State-of-the-art production units</li>
        <li>Unique products</li>
        <li>Expertise in ensuring customer satisfaction</li>
        <li>High quality products</li>
        <li>Beautifully designed gifts</li>
        <li>Proper quality inspection</li>
        <li>Transparent deals</li>
        <li>Prompt delivery</li>
        <li>Ethical business policies</li>
        
    </ul>
  </p>
  <h2 class="sticky">Sales and Offers</h2>

  <table border="1" bgcolor="#a9cfbc">
    <tr style="text-align: center; padding: 5px;">
      <th>Annual offers</th>
      <th>Festive Offers</th>
    </tr>
    <td style="padding: 5px;">
      <ol>
        <a href="" class="text-decoration-none">40% off on Jewellery</a>
      </ol> 
      <ol>
        <a href="" style="text-decoration: none;">30% off on craft</a> 
      </ol>
    </td>
    <td style="padding: 5px;">
      <ol>
        <a href="" style="text-decoration: none;">35% off on Jewellery</a>
      </ol>
      <ol>
        <a href="" style="text-decoration: none;">20% off on craft</a>
      </ol>
    </td>

  </table>
  <p>
    <h5 class="sticky">
    For inquiry regarding corporate gifts you can call us on +91-1234567890 or write us at craftizen@gmail.com and let us know about the requirements.
    </h5>
  </p>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      
</div>
</body>
<footer class="text-black" style="background-color:#ffdfb6 ;">
    <div class="container text-center text-md-left">
        <div class="row text-center text-md-left">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
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
                    <a  href="#"><img src="home-fill.png" width=auto height="18"/></a> 
                    PCE, Panvel, Mumbai 
                </p>
                <p>
                    <a  href="#"><img src="mail-fill.png" width=auto height="18"/></a> 
                    craftizen@gmail.com 
                </p>
                <p>
                    <a  href="#"><img src="phone-fill.png" width=auto height="18"/></a> 
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