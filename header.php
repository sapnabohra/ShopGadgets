<?php
if(isset($_POST['searchItem']))
{ // button name
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
  $sql = 'SELECT  ProductID,ProductDescription,UnitPrice FROM product where 
  ProductID = :ProductID or ProductDescription = :ProductDescription';
          
    $s = $pdo->prepare($sql);
    $s->bindValue(':ProductID', $_POST['searchItem']);
    $s->bindValue(':ProductDescription', $_POST['searchItem']);
   $s->execute();
   $result = $s->fetchAll();

}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}
include 'Phones.html.php';

}
