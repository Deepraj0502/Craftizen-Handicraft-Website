<?php
$server="localhost";
$username="root";
$password="";
$database="craftizen";

$conn= new mysqli($server,$username,$password,$database);
session_start();
$name=$_GET['name'];
$sql1='SELECT * FROM products_info WHERE name="'.$name.'"';
$r1=$conn->query($sql1);
$result1=$r1->fetch_all();
$sql2='INSERT INTO `products_cart` VALUES ("'.$_SESSION['mno'].'","'.$result1[0][1].'",'.$result1[0][2].',"'.$result1[0][4].'",1)';
$r2=$conn->query($sql2);
echo '<script>window.location.href="cart.php";</script>';

?>