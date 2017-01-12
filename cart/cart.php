

<table>
  <tr>
    <th>Order ID</th>
    <th>Order Date</th>
	<th>Customer Name</th>	
  </tr>
<?php foreach ($result as $order):?>
  <tr>
   <td><?php echo $order['orderNumber']?></td>
   <td><?php echo  $order['orderDate']?></td>
   <td><?php echo $order['customerName']?></td>
 </tr>
<?php endforeach;?> 
</table>