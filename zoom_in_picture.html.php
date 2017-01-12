<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<?php 
include 'cart/index.php';
include 'cart/cart.php';?>

<meta charset="UTF-8">
<link rel="stylesheet" href="cart/cartstyle.css">
<link rel="stylesheet" href="styles/footer.css">
<link rel="stylesheet" href="styles/Miami_style.css">
<script type="text/javascript" src="scripts/jquery-1.12.1.js"></script>
<script type="text/javascript" src="scripts/cart.js"></script>
<title>List of Products</title>
</head>
<body>
<iframe id="headerIframe" src="header.html" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" width="100%" height="90px">
</iframe>
<style>
#button{
	margin: 200px 10px 200px 10px;
}
form {
	background-color: #E5E5E5;
}
</style>
<form >
<div>
<ul style="list-style-type:none">
<li>
 <input  class="id1" type="hidden" name="ProductID" value="<?php echo $_GET['ProductID']; ?>">
 <input class="desc1" type="hidden" name="ProductDescription" value="<?php echo $_GET['ProductDescription']; ?>">
 <input class="price1" type="hidden" name="UnitPrice" value="<?php echo $_GET['UnitPrice']; ?>">
     <input type="hidden" name="command" />
<?php $image_url = 'images/'.$_GET['ProductID'].'.jpg' ?>
<div class="oneProd">
<img  src="<?php echo $image_url;?>" alt="SFO" >
<p><b><?php echo $_GET['ProductDescription']; ?></b></p>
<p><b>$<?php echo $_GET['UnitPrice']; ?></b></p>  
<label>
        <span>Quantity</span>
        <input class="qty2" id="qty1" placeholder="Qty"></input>
</label>
<img class="cartIcon3" src="images/cart2.png" style="height:30px;">
<input id="b1" class="cart" type="button" value="Add to Cart" name="submit" style="margin-left:-13em;" /> </br></br>
<b>In Stock.</b></br>
<p><b>Arrives before Christmas.</b>Choose delivery option in checkout.</p>
<ul>

<li>Boost Mobile Service</li>
	<li>Android 6.0 Marshmallow OS</li>
	<li>13MP Rear Camera and 5MP Front Facing Camera</li>
	<li>5.5" HD Super AMOLED Display</li>
	<li>16GB ROM/2GB ROM</li>

</ul>
<a href="cart/viewcart.html.php"><button type="button" class="cartButton2"id="button">View Cart</button></a>
</div>
</li>
</ul>
</div>
</form>


 </body>
 <iframe src="footer.html" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" width="109.4%" height="90px" style="margin-left: -1em;">
 </iframe>
</html>
