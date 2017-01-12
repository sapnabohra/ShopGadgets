<?php

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
  $sql = 'SELECT * FROM product ';
   $s = $pdo->prepare($sql);
   $s->bindValue('ProductID', $_POST['ProductID']);
   $s->execute();
   $result = $s->fetchAll();
   
foreach ($result as $product){
	$s->bindValue('ProductID', $_POST['ProductID']);
	$s->bindValue('Description', $_POST['ProductDescription']);
	$s->bindValue('Price', $_POST['UnitPrice']);
	
	
}


}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}


?>