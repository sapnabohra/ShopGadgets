
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/product_style.css">
<title>List of Products</title>
</head>
<body>

<?php foreach ($result as $product): ?>
<form method="post" action="error.html.php">
<button>
<ul style="list-style-type:none">
<li>
 <input type="hidden" name="ProductID" value="<?php echo $product['ProductID']; ?>">
 <input type="hidden" name="ProductDescription" value="<?php echo $product['ProductDescription']; ?>">
 <input type="hidden" name="UnitPrice" value="<?php echo $product['UnitPrice']; ?>">
<?php $image_url = 'images/'.$product['ProductID'].'.jpg' ?>
<img  src="<?php echo $image_url;?>" alt="SFO" >
<p><?php echo $product['ProductDescription']; ?></p>
<p>$<?php echo $product['UnitPrice']; ?></p>  
</li>
</ul>
</button>
</form>
<?php endforeach; ?>

  </body>
</html>
