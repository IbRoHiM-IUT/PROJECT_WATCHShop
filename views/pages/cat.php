<?php foreach($products as $item) :?>

	<div class="row-sm-3" >
		<div class="col-sm-4">
				<div class="image"><a href="index.php?view=product&id=<?=$item['id']  ?>"><img src="userfiles/<?=$item['image']?>" alt=""></a></div>
	            <div class="caption">
	        	<h4><a href="#"><?=$item['title']?></a></h4>
	            <p class="price">Price: $<?=$item['price']?></p>
	            </div>
		      	<div class="button-group">
		        <button type="button"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Basket</span></button>
		      	</div>
	    </div>
    </div>

<?php endforeach; ?>