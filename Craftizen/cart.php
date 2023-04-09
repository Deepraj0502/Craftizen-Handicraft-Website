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
$sql2='SELECT * FROM user_info where mobileno="'.$mno.'"';
$r2=$conn->query($sql2);
$result2=$r2->fetch_all();

$sql='SELECT * FROM products_cart where mobileno="'.$mno.'"';

$r1=$conn->query($sql);
$result=$r1->fetch_all();

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
    <link rel="stylesheet" href="cartstyle.css">
    <link rel="stylesheet" href="stoneart.css">
    <link rel="stylesheet" href="homestyle.css">
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
        echo '<p class="nav-username"><img src="https://ui-avatars.com/api/?background=ffc556&name='.$result2[0][0].'" alt="profile_pic" class="nav-username-img"><span>'.$result2[0][0].'</span></p>';
    }
    else{
        echo '<button class="nav-login" onclick="nav()"><span>LOGIN</span></button>';
    }
    ?>
</nav>
<body>
    <div class="body">
        <div class="left-section">
            <div style=" margin: 2%">
                <h2 style="margin-left: 30%;">SHOPPING CART</h2>
                <section id="cart-container" class="container my-5">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Remove</td>
                                <td>Images</td>
                                <td>Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Add</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if(count($result)!=0){
                            for($i=0;$i<count($result);$i++){
                                echo '<tr>';
                                echo '<td><a href="remove.php?name='.$result[$i][1].'"><img src="./delete-bin-6-fill.png" style="width: 25px; height: auto;"></a> </td>';
                                echo '<td><img src="./'.$result[$i][3].'.jpg"></td>';
                                echo '<td><h5 style="font-size: 16px;font-family:math;">'.$result[$i][1].'</h5></td>';
                                echo '<td><h5 style="font-size: 18px;font-family:math;">₹'.$result[$i][2].'</h5></td>';
                                echo'<td><p class="w-25 pl-1" style="margin:auto">'.$result[$i][4].'</td>';
                                echo '<form action="add.php?add='.$result[$i][1].'" method="POST">';
                                echo'<td><input class="w-25 pl-1" style="width:60% !important;padding-left:10px;margin-top:20px;" value="0" type="number" name="qty"><input type="submit" class="add-prd" value="ADD"/></td>';
                                echo '</form>';
                                echo'</tr>';
                            }
                        }
                        else{
                            echo '<tr>';
                            echo '<td><a href="#"><img src="./delete-bin-6-fill.png" style="width: 25px; height: auto;"></a> </td>';
                            echo'<td><p class="w-25 pl-1" style="margin:auto">empty</td>';
                            echo '<td><h5 style="font-size: 16px;font-family:math;">empty</h5></td>';
                            echo '<td><h5 style="font-size: 18px;font-family:math;">empty</h5></td>';
                            echo'<td><p class="w-25 pl-1" style="margin:auto">empty</td>';
                            echo'<td><input class="w-25 pl-1" style="width:60% !important;padding-left:10px;margin-top:20px;" value="0" type="number" name="qty"><input type="submit" class="add-prd" value="ADD"/></td>';
                            echo'</tr>';
                        }
                            ?>
                        </tbody>
                    </table>
                </section>

            </div>
        </div>
        <div class="right-section">
          <section id="cart-bottom" class="container">
            <div class="col">
                <div class="total ">
                    <div style="text-align: center;">
                        <h5>TOTAL</h5>
                        <?php
                            for($i=0;$i<count($result);$i++){
                            echo'<div class="d-flex justify-content-between">';
                            echo'<h6 style="font-weight: 100;font-family:math">'.$result[$i][1].'</h6>';
                            echo' <p tyle="font-weight: 100;">'.$result[$i][2]*$result[$i][4].'.00</p>';
                            echo'</div>';
                            }
                        ?>
                        <div class="d-flex justify-content-between">
                            <h6>Subtotal</h6>
                            <?php
                            $subtot=0;
                            for($i=0;$i<count($result);$i++){
                                $subtot=$subtot+($result[$i][2]*$result[$i][4]);
                            }
                            echo '<p>'.$subtot.'.00</p>';
                            ?>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Shipping</h6>
                            <p>40.00</p>
                        </div>
                        <hr class="second-hr">
                        <div class="d-flex justify-content-between">
                            <h6>Total</h6>
                            <?php
                            echo '<p>'.($subtot+40).'.00</p>';
                            ?>
                        </div>
                        <p style="position: relative;top:15px;">Only COD Available</p>
                        <a class="btn btn-lg" style="background-color: aquamarine;margin-top:20px;" href="order_backend.php?total=<?php echo ($subtot+40)?>" role="button">Place Order</a>
                    </div>
                </div>

            </div>
          </section>
        </div>
      </div>
</body>
</html>