<?php

 session_start();
	try
	{

	  $pdo = new PDO('mysql:host=localhost;dbname=lsmarketplace', 'reema', 'root123');
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
	  $sql = 'DELETE FROM cartdetails WHERE ProductID=:ProductID and CustomerID= (SELECT CustomerID FROM customer WHERE email=:email) ';
	   $s = $pdo->prepare($sql);
	    $s->bindValue(':ProductID', $_GET['productID']);
		$s->bindValue(':email', $_SESSION["custEmail"]);
	   $s->execute();
	   $result = $s->fetchAll();
	  

	}
	catch (PDOException $e)
	{
	  $error = 'Error fetching departments: ' . $e->getMessage();
	  include 'error.html.php';
	  exit();
	}


