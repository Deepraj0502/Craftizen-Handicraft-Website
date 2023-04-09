<?php
$server='localhost';
$username='root';
$password='';
$database='Craftizen';

$conn= new mysqli($server,$username,$password,$database);

$name=$_GET['name'];
$sql='DELETE FROM `products_cart` WHERE prdname="'.$name.'"';

$r1=$conn->query($sql);
echo '<script>window.location.href="cart.php";</script>';

?>