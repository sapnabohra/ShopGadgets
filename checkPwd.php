
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




	  	$userlogin = $_GET['email'];
	  	try {
	  		$sql = "SELECT * FROM customer WHERE email = '$userlogin'";
    		$result = $pdo->query($sql);
    		if($result->rowCount() == 0) {
    		$value =  array('msg' => 'false' );
         
			}
			else {
				$userpwd = $_GET['passWord'];
	  			$row = $result->fetch();
	  			$userhash = $row['password'];
	  		} 
  		}  catch (PDOException $e)  {
    		$error = 'Error retrieving user login information: ' . $e->getMessage();
    		include 'error.html.php';
    		exit();
  		}
	     $input =$userpwd;
	  	if (password_verify($input, $userhash)){
	  		$value =  array('msg' => 'true' );
        $_SESSION["custEmail"] = $userlogin;
	  	} else {
		  	$value =  array('msg' => 'false' );
	  	}
      echo json_encode($value);
      ?>
    </p>
  </body>
</html>




