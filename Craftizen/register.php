<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="craftizen";

$conn = new mysqli($servername, $username, $password,$database);

session_start();
if(isset($_POST['name'])){
  $sql = 'INSERT INTO `user_info` VALUES ("'.$_POST['name'].'","'.password_hash($_POST['pass'],PASSWORD_DEFAULT).'","'.$_POST['m_number'].'","'.$_POST['email'].'","'.$_POST['address'].'");';
  $conn->query($sql);
  $_SESSION['mno']=$_POST['m_number'];
  echo '<script>window.location.href="home.php";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign up Page</title>
<meta charset="utf-8">
<link rel="stylesheet" href="registerstyle.css">
<style>
#container{
margin: auto;
position: relative;
top: 68px;
width:1000px ;
height: 500px;
}
</style>
<script>
    function validateForm(){
      var Name=document.RegForm.name.value;
      var Password=document.RegForm.pass.value;
      var EmailId=document.RegForm.email.value;
      var MobileNumber=document.RegForm.m_number.value;
      var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
      var format2 = /[abcdefghijklmnopqrstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ]+/;
      var format3 = /[1234567890]+/;
      if (Name == ""){
        alert("Please Enter Name");
        return false;
      }
      if (Password == ""){
        alert("Please Enter Password");
        return false;
      }
      if (Password.length < 8){
        alert("Please Enter atleast 8 characters");
        return false;
      }
      if (Password !=""){
        if(format1.test(Password)==false){
          alert("Please Enter Numbers,Characters,Special Symbols (@,#,_)");
          return false;
        }
        if(format2.test(Password)==false){
          alert("Please Enter Numbers,Characters,Special Symbols (@,#,_)");
          return false;
        } 
        if(format3.test(Password)==false){
          alert("Please Enter Numbers,Characters,Special Symbols (@,#,_)");
          return false;
        } 
      }
      if (MobileNumber == ""){
        alert("Please Enter Mobile Number");
        return false;
      }
      if (MobileNumber.length !=10){
        alert("Invalid Mobile Number");
        return false;
      }
      if (EmailId == ""){
        alert("Please Enter Email ID");
        return false;
      }
      if (EmailId.substr(-10) != "@gmail.com"){
        alert("Enter Valid Email ID");
        return false;
      }
      else{
        return true;
      }
    }
</script>
</head>
<body class="fullpage">
<div id="container">
<div id="left">
<img src="./Craftizen.jpeg" class="image" width="550px"

height="200px">


</div>
<div id="box">
<form class="RegForm" name="RegForm" onsubmit="return validateForm()" action="register.php" method="POST">
<h1 class="reg">Register</h1>
<label class="att">Name</label>
<br>
<input type="text" class="contents" placeholder="Enter your Name" name="name">

<br>

<label class="att">Password</label>
<br>
<input type="password" class="contents" placeholder="Password" name="pass">
<br>
<label class="att">Mobile Number</label>
<br>
<input type="tel" class="contents" placeholder="Enter your mobile no." name="m_number">
<br>
<label class="att">Email</label>
<br>
<input type="email" class="contents" placeholder="Enter your mail id" name="email">
<br>
<label class="att">Address</label>
<br>
<input type="text" class="contents" placeholder="Enter Address" name="address" required>
<br>
<br>
<input type="submit" class="sub" style=" width: 200px;
height: 40px;
position: relative;
left: 50px;
top: 10px;
font-size: 20px;
transition:linear 0.1s;
border: 2px solid black;
border-radius: 20px;
width: 78%;
background-color: #a9cebc ;" value="Register">
<p class="ar-text">Already Registered?</p><a href="login.php" class="lg-btn">Login here</a>
</form>
</div>
</div>
</body>

</html>

