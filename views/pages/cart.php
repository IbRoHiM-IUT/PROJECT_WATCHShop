
<style type="text/css">
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
}

tr, td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>

<h2 align="center" style="color: black;">Your basket</h2>


<?php 
	if($_SESSION['cart']) 
	{
 ?>

<form action="index.php?view=update_cart" method="post" id="cart-form">
	
	<table id="mycart" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<th>Product</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>

	<?php foreach ($_SESSION['cart'] as $id => $quantity) : 
		$product = get_product($id);	
	?>

		<tr>
			<td align="center"><?=$product['title'];?></td>
			<td align="center">$<?=number_format($product['price'],2);?></td>
			<td align="center"><input type="text" size="2" name="<?=$id;?>" maxlength="2" value="<?=$quantity;?>"></td>
			<td align="center">$<?=number_format($product['price'] * $quantity,2);?></td>
		</tr>
  
	<?php endforeach; ?>

	</table>
	<p align="center"><br>Total sum: <span>$<?=number_format($_SESSION['total_price'],2);?></span></p>
	<p align="center"><input type="submit" name="update" value="Refresh"></p>

</form>

<p align="center"><a href="index.php?view=order">Confirm order</a></p>

<?php 
	}
	else {
		echo "<p align='center' style='color:#fff'>Your basket is empty!</p>";
	}
 ?>