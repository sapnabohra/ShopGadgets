
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
       // echo "fdjnkhg13476";
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


$userlogin = 'test1@gmail.com';
  $userpwd = 'test123';
  $userPwdHash = password_hash($userpwd,PASSWORD_DEFAULT);
  echo $userPwdHash.'that is another'.' '.' ';
  try {
        $sql = 'UPDATE customer SET
            password = :pwdHash where email = :login';

        $s = $pdo->prepare($sql);
        $s->bindValue(':login', $userlogin);
        $s->bindValue(':pwdHash', $userPwdHash);
    
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error adding new user: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    $userlogin1 = 'test2@gmail.com';
  $userpwd1 = 'test123';
  $userPwdHash = password_hash($userpwd1,PASSWORD_DEFAULT);
  echo $userPwdHash.'that is another'.' '.' ';
  try {
        $sql = 'UPDATE customer SET
            password = :pwdHash where email = :login';

        $s = $pdo->prepare($sql);
        $s->bindValue(':login', $userlogin1);
        $s->bindValue(':pwdHash', $userPwdHash1);
    
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error adding new user: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }

	  ?>
    </p>
  </body>
</html>




