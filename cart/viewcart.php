<?php
session_start();
try
{


  $pdo = new PDO('mysql:host=localhost;dbname=lsmarketplace', 'root', 'root123');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');

}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}



try
{
  $sql = 'SELECT product.ProductDescription,product.UnitPrice, cartdetails.ProductID,cartdetails.orderQuantity,cartdetails.CustomerID FROM product INNER JOIN cartdetails ON product.ProductID = cartdetails.ProductID WHERE CustomerID= (SELECT CustomerID FROM customer WHERE email=:email) ';
   $s = $pdo->prepare($sql);
  // $s->bindValue('ProductID', $_POST['ProductID']);
    $s->bindValue(':email', $_SESSION["custEmail"]);
   $s->execute();
   $result = $s->fetchAll();
   
   
foreach ($result as $cart){
	$ProductID = $cart['ProductID'];
	$orderQuantity = $cart['orderQuantity'];
	$CustomerID = $cart['CustomerID'];
	$ProductDescription = $cart['ProductDescription'];
	$UnitPrice = $cart['UnitPrice'];
}

}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}

try
	{
	  $sql = 'select sum(price) as Total from 
		(select CustomerID,(select UnitPrice*c.orderQuantity from product p where p.ProductID=c.ProductID) price from cartdetails c where CustomerID=1) Price ';
	   $s = $pdo->prepare($sql);
	   $s->execute();
	   $total = $s->fetchColumn();;
	 

	   

	}
	catch (PDOException $e)
	{
	  $error = 'Error fetching departments: ' . $e->getMessage();
	  include 'error.html.php';
	  exit();
	}


