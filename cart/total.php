<?php
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

