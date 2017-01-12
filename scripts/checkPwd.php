
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
        echo "fdjnkhg123456";
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

	  	$userlogin = $_POST['username'];
      echo $userlogin;
	  	try {
	  		$sql = "SELECT * FROM customer WHERE email = '$userlogin'";
    		$result = $pdo->query($sql);
    		if($result->rowCount() == 0) {
    		$value =  array('msg' => 'false' );
         
			}
			else {
				$userpwd = $_POST['passWord'];
	  			$userEnteredPwdHash = password_hash($userpwd,PASSWORD_DEFAULT);
	  			$row = $result->fetch();
	  			$userhash = $row['password'];
	  		} 
  		}  catch (PDOException $e)  {
    		$error = 'Error retrieving user login information: ' . $e->getMessage();
    		include 'error.html.php';
    		exit();
  		}
	
	  	if (password_verify($userpwd, $userhash)){
	  		$value =  array('msg' => 'true' );
	  	} else {
		  	$value =  array('msg' => 'false' );
	  	}
     // echo json_encode($value);
      ?>
    </p>
  </body>
</html>




