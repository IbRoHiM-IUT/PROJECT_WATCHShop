
<table width="900" cellspacing="0" cellpadding="0" border="0" >
	<tr>
		<td valign="top">
				<div class="image"><a href="#"><img src="userfiles/<?=$product['image']?>" alt=""></a></div>
	            <div class="caption">
	        	<h4><a href="#"><?=$product['title']?></a></h4>
	            <p class="price">Price: $<?=$product['price']?></p>
	            </div>
		      	<div class="button-group">
		        <button type="button"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Basket</span></button>
		      	</div>
	    </td>

    	<td valign="top" width="100">
				<div><?=$product['description']?></div>
				<div><a style="color: white;" href="index.php?view=add_to_cart&id=<?=$product['id'] ?>">Add to basket</a></div>
	    </td>
    </tr>
</table>
