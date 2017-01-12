
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


echo $_GET['ProductDescription'];
echo  $_SESSION["custEmail"];
print_r($_SESSION);
	  ?>
    </p>
  </body>
</html>




