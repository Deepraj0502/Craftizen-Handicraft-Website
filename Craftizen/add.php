<?php
$server="localhost";
$username="root";
$password="";
$database="craftizen";

$conn= new mysqli($server,$username,$password,$database);

$qty=$_POST['qty'];
$name=$_GET['add'];
$sql='UPDATE `products_cart` SET `prdqty`=`prdqty`+'.$qty.' WHERE `prdname`="'.$name.'"';
$r1=$conn->query($sql);
echo '<script>window.location.href="cart.php";</script>';

?>