
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

<h2 align="center" style="color: black;">Confirm order</h2>



<?php 
	
	$name=null;
	$s_name=null;
	$address=null;
	$post_index=null;
	$email=null;
	$date1=null;
	$time1=null;
	$product=null;
	$prod_id=null;
	$price=null;
	$quantity=null;

	if($_SESSION['cart'] && !isset($_POST['order'])) 
	{
 ?>

<form action="index.php?view=order" method="post" id="cart-form">
	
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
			<td align="center"><?=$quantity;?></td>
			<td align="center">$<?=number_format($product['price'] * $quantity,2);?></td>
		</tr>
  
	<?php endforeach; ?>

	</table>
	<p align="center" style="color: #fff"><br>Total sum: <span>$<?=number_format($_SESSION['total_price'],2);?></span></p>

	<p align="center" style="color: black;">
		Your Name: <br>
		<input type="textarea" name="name"><br>
		Your Surname: <br>
		<input type="text" name="s_name"><br>
		Your address: <br>
		<input type="text" name="address"><br>
		Postal address: <br>
		<input type="text" name="post_index"><br>
		Your Email: <br>
		<input type="text" name="email"><br>

	</p>

	<p align="center"><input type="submit" name="order" value="Order"></p>

</form>

<?php 
	}

	if($_SESSION['cart'] && isset($_POST['order']))
	{
		foreach ($_POST as $ArrKey => $ArrStr) {
			$ArrKey = $_POST[$ArrKey];
		}
		$date = date('Y-m-d');
		$time = date('H:i:s');

		foreach ($_SESSION['cart'] as $id => $quantity) : 
		$product = get_product($id);
			$query = mysql_query("INSERT INTO orders(name, s_name, address, post_index, email, date1, time1, product, prod_id, price, quantity) VALUES ('$name','$s_name','$address','$post_index','$email', '$date', '$time', '{$product['title']}','{$product['id']}','{$product['price']}','$quantity')");
		endforeach;

		echo "<p align='center' style='color: #fff'>Your order has been accepted! Thank you for your purchase!</p>";
	}
 ?>