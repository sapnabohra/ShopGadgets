<?php

try
{

  $pdo = new PDO('mysql:host=localhost;dbname=lsmarketplace', 'root', 'root123');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
// This is in the PHP file and sends a Javascript alert to the client
$message = "Order has been Placed";
echo "<script type='text/javascript'>alert('$message');</script>";
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}
