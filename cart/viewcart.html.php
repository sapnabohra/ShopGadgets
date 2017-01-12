<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<script type="text/javascript" src="jquery-1.12.1.js"></script>
<?php 
include 'cart/index.php';

?>
<style>
#cart_div{
	
	    border: 1px solid black;
    margin: 100px 100px 100px 300px;
    background-color: lightblue;

}
#button{
		 margin: 100px 20px 20px 20px;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<meta charset="UTF-8">

<title>List of Products</title>
<script language="javascript">
	function deleteTag(btn) {
  // select the row that's concerned
  var row = btn.parentNode.parentNode;

  // select the name of this row
  var name = row.children[0].textContent;

  // remove the row on client side
  row.parentNode.removeChild(row);

var id = $(this).attr('id');
alert('idhgh is'+ id);

var prodID = '.id'+id;
var productID = $(prodID).val();
alert('prodbnvnbv is'+ productID);
  // AJAX call to remove the row server side
  var xhr = new XMLHttpRequest();
    xhr.open('POST', 'delete.php?productID='+productID);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {

var dataReturn= xhr.responseText;

      }
    xhr.send(productID);


}


</script> 
</head>
<body>
<?php 
include 'viewcart.php';
?>
<div id ="cart_div">
<h2 align="center">Your Shopping Cart</h2>
<form  action="" name="form1" method="post">
<table>
  <tr>
    <th>Name</th>
    <th>Price</th>
	<th>Quantity</th>	
	<th>Option</th>	
  </tr>
<?php foreach ($result as $cart):?>
  <?php $productbutID = 'id'.$cart['ProductID'] ?>

 <input class="<?php echo $productbutID;?>" type="hidden" name="ProductID" value="<?php echo $cart['ProductID']; ?>">
 <input type="hidden" name="ProductDescription" value="<?php echo $cart['ProductDescription']; ?>">
 <input type="hidden" name="UnitPrice" value="<?php echo $cart['UnitPrice']; ?>">
  <input type="hidden" name="orderQuantity" value="<?php echo $cart['orderQuantity']; ?>">
 <input type="hidden" name="CustomerID" value="<?php echo $cart['CustomerID']; ?>">
 <input type="hidden" name="command" />

  <tr>
    <td><?php echo $cart['ProductDescription']?></td>
    <td><?php echo $cart['UnitPrice']?></td>
   <td><?php echo $cart['orderQuantity']?></td>
    <td><input id="<?php echo $cart['ProductID']; ?>" type="submit" value="Delete" name="delete" onClick="deleteTag(this)" /></td>
  </tr>
<form action="" name="form" method="post">
<?php endforeach; ?>
<tr><td><b>Order Total: $<?php echo $total; ?></b></td></tr>
</table>
<a href = "Phone.html.php"><input  type="button" value="Continue Shopping" id="button" /></a>
<input type="submit" value="Place Order" name="submit"  />
</form>
</form>
</div>


<?php
if(isset($_POST['submit'])){
  $CustomerID = $cart['CustomerID'];
	
	include 'placeorder.php';
	
	try
{
  $sql = "INSERT INTO `manageorder`(`orderStatus`, `orderDate`, `totalPrice`, `customer_CustomerID`) VALUES ('Cancelled','2016-11-12','$total','$CustomerID')";
   $s = $pdo->prepare($sql);
   
   $s->execute();
   $result = $s->fetchAll();
 
}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}
 
}

?>
 </body>
</html>