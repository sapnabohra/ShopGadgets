<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/header.css">
<title>Restaurant Home Page Website</title>
<script type="text/javascript" src="scripts/jquery-1.12.1.js"></script>
<script type="text/javascript" src="scripts/header.js"></script>
</head>
<body>
<header>
<a href="homepage.html" target="_top" style="margin-top:-30em;"><div id="logo"><img src="images/sglogo.jpg" alt="some_text" ></div><span id="logotext">ShopGadgets</span>
</a>
<div class="cartCount">
<img class="cartIcon1" src="images/cart2.png" style="height:30px; ">
<div class="countinCart">0.0</div>
<div class="cartPrice">0</div>
</div>
<div class ="logSearch" >
<a href="login.html" target="_top">
<div class="login">
<button class="button" style="vertical-align:middle" onclick="login.html">
<span id="UserName" >Login </span></button>
</div></a>
<div class="searchbtn">
<form  action="header.php" method="post" target="_top">
<button class="button1" name="searchButton" style="vertical-align:middle;width:20px;"><span id="searchId"></span></button></form>
</div>
<div class="Search">
<div style="float: right">
  <input type="text" name="searchItem" class="searchItem" id="searchItem" placeholder="Search">
</div>
</div>
</div>
</header>
</body>
</html>