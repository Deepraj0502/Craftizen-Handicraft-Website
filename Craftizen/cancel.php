<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'Craftizen';

$conn = new mysqli($server, $username, $password, $database);

$sql3 = 'DELETE FROM `orders_info` WHERE order_id=' . $_GET['id'] . '';
$conn->query($sql3);
echo "<script>window.location.href='orders.php'</script>";
?>