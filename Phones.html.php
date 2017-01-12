<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/Miami_style.css">
<link rel="stylesheet" href="styles/footer.css">
<script type="text/javascript" src="scripts/jquery-1.12.1.js"></script>
<script type="text/javascript" src="scripts/cart.js"></script>
<title>Gadgets Page</title>
</head>
<body>
<iframe id="headerIframe" src="header.html" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" width="100%" height="90px">
</iframe>
<main>
<section class="banner" style="height:330px;">
<div class="search">
<input type="text" class="input_search autosuggesttag" autocomplete="off" id="hp_tags" name="hp_tags" placeholder="Know what you want? Search for Phones, laptops, Iphones">
<input type="button" class="search_btn" onclick="search_submit('hp_tags');" value="search" id="srch_submit">
<div class="suggestions" id="sugg_hp_tags" style="display: none;">
 </div>
 </div>
</section>
<h1>Here's what we have for you based on what you specified</h1>
<div class=".res-left-area">
<ul class = "sel_restaurant" style="list-style-type:none">
<?php foreach ($result as $product): ?>
<?php $productbutID = 'id'.$product['ProductID'] ?>
<?php $productbutDesc = 'desc'.$$product['ProductID'] ?>
<?php $productbutPrice = 'price'.$product['ProductID'] ?>
<?php $productbutQty = 'qty'.$product['ProductID'] ?>
<input  class="<?php echo $productbutID;?>" type="hidden" name="ProductID" value="<?php echo $product['ProductID']; ?>">
 <input class="<?php echo $productbutDesc;?>" type="hidden" name="ProductDescription" value="<?php echo $product['ProductDescription']; ?>">
 <input class="<?php echo $productbutPrice;?>" type="hidden" name="UnitPrice" value="<?php echo $product['UnitPrice']; ?>">
 <?php $image_url = 'images/'.$product['ProductID'].'.jpg' ?>

<li class="restaurants" >
<a href="zoom_in_picture.html.php?ProductID=<?php echo $product['ProductID']; ?>&ProductDescription=<?php echo $product['ProductDescription']; ?>&UnitPrice=<?php echo $product['UnitPrice']; ?>&imageURL=<?php echo $image_url;?>" >
<div class ="flip">
<img class ="flip_front" src="<?php echo $image_url;?>" alt="SFO" >
<img class ="flip_back" src="<?php echo $image_url;?>" alt="SFO" >
<table class ="loc_rate" width="100%" height="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td valign="middle">
<article class="loca">
<aside class="price">
<small><?php echo $product['ProductDescription']; ?></small><br>
<small>$<?php echo $product['UnitPrice']; ?></small>
</aside>
</article>
</td></tr></tbody></table>
</div>
<p class="restaurant_name"><?php echo $product['ProductDescription']; ?></p></a>	
<button class ="cart" value="Add TO Cart" id="<?php echo $product['ProductID']; ?>">
<span class="addToCart">Add To Cart</span>
<img class="cartIcon" src="images/cart2.png" >
</button>
<input class="qty" id="<?php echo $productbutQty;?>" placeholder="Qty"></input>

</li>
<?php endforeach; ?>
</ul>
</div>
</main>
</body>
<iframe src="footer.html" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" width="109.4%" height="90px" style="margin-left: -1em;">
 </iframe>
</html>