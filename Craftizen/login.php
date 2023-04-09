<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="craftizen";

$conn = new mysqli($servername, $username, $password,$database);

session_start();
$invalid="none";
if(isset($_POST['mno'])){
  $sql = 'SELECT password FROM user_info WHERE mobileno="'.$_POST['mno'].'";';
  $r1=$conn->query($sql);
  $result=$r1->fetch_all();
  if(count($result)>0){
    if(password_verify($_POST["pass"],$result[0][0])){
        $_SESSION['mno']=$_POST['mno'];
        echo '<script>window.location.href="home.php";</script>';
    }
    else{
        $invalid="block";
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    #head{
        font-family: monospace;
        font-size: 39px;
        position: relative;
        left: 0px;
        top: 50px;
        color: #333333;
        text-align: center;
    }
    #forgot{
        font-family: 'poppin_regular';
        font-size: 14px;
        position: absolute;
        left: 10%;
        color: black;
        bottom: 230px;
    }
    .logo{
        width: 480px;
        position: relative;
        top: 5%;
        left: 6%;
        z-index: 0;
    }
    .invalid{
        color: red;
        position: relative;
        left: 325px;
        top: -20px;
    }
    </style>
</head>
<link rel="stylesheet" href="loginstyle.css">
<body>
    <div class="outer" style="background-image: url('https://media.istockphoto.com/id/1367242566/photo/cream-concreted-wall-for-interiors-or-outdoor-exposed-surface-polished-concrete-cement-have.jpg?b=1&s=170667a&w=0&k=20&c=mMOIyIv40GF2Flv4-LEO7AOftLXdzqSWS_2KtZGy7uY=');">
        <div class="inner-box">
            <div class="image-box">
                <img src="./Craftizen.jpeg" alt="" class="logo">
                <div class='social-logo'>
            </div>
            </div>
            <div class="box">
                <h1 id="head">Login</h1>
                <form action="login.php" name="LogForm" method="POST">
                    <label for="mno">Mobile Number</label><br>
                    <input type="text" name="mno" id="username" required><br>
                    <label for="pass" class="pass">Password</label><br>
                    <input type="password" name="pass" id="pass" required>
                    <input type="submit" value="LOGIN" id="button1">
                </form>
                <a href='login.php' style="text-decoration: none;">
                    <h2 id="forgot">Forgot Password?</h2>
                </a>
                <p class="invalid" style="display:<?php echo $invalid ?>;">Invalid Credentials</p>
                <a href="register.php" class="reg_btn">Click to Register</a>
            </div>
        </div>
    </div>
</body>
</html>