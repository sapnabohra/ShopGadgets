<!DOCTYPE html>
<html lang="en">
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Checking Password with Bcrypt</title>
  </head>
  <body>

    <p>
      	<?php
        session_start();
         $custEmail =  $_SESSION["custEmail"];

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

        if (isset($_GET['productID']))
        {

     $productID = $_GET['productID'];
      $productQty = $_GET['productQty'];
    
     $cartID = 4;
     $CustomerID = 1;
	  	try {
   $sql = 'INSERT INTO cartdetails SET
        ProductID = :ProductID,
        orderQuantity = :orderQuantity,
        CustomerID= (SELECT CustomerID FROM customer WHERE email=:email)';
    $s = $pdo->prepare($sql);
    $s->bindValue(':ProductID', $_GET['productID']);
    $s->bindValue(':orderQuantity', $_GET['productQty']);
     $s->bindValue(':email', $_SESSION["custEmail"]);

    
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error inserting cart details: ' . $e->getMessage();
    include 'error.html.php';
    exit();
  }
}

else 
{

 try {
  $sql = "SELECT SUM(orderQuantity) AS tot FROM cartdetails where 
 CustomerID = (SELECT CustomerID FROM customer WHERE email='$custEmail') GROUP BY CustomerID";
 $result = $pdo->query($sql);
 $row = $result->fetch();
 $count = $row['tot'];
//$value =  array('msg' => $count);



      }  catch (PDOException $e)  {
        $error = 'Error retrieving user login information: ' . $e->getMessage();
        include 'error.html.php';
        exit();
      }

 try {
  $sql1 = "SELECT SUM(price) AS totPrice from (select CustomerID,(select UnitPrice*orderQuantity from product p where p.ProductID=c.ProductID) price from cartdetails c where CustomerID= 1) Price";

 


 $result = $pdo->query($sql1);
 $row = $result->fetch();
 $price = $row['totPrice'];
 $value =  array('msg' => $count,'pricet' => $price);
//$value =  array('msg' => $totPrice);
 echo json_encode($value);

      }  catch (PDOException $e)  {
        $error = 'Error retrieving user login information: ' . $e->getMessage();
        include 'error.html.php';
        exit();
      }




    /* try
{
  $sql = 'UPDATE cartdetails SET ProductID=1';
  $affectedRows = $pdo->exec($sql);
  //$value =  array('msg' => 'true' );
  //echo json_encode($value);
  echo "something happening";
}
catch (PDOException $e)
{
  $output = 'Error performing update: ' . $e->getMessage();
  include 'output.html.php';
  exit();
}*/
}
   ?>
    </p>
  </body>
</html>




