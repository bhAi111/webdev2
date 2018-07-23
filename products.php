<?php include_once('header.php'); ?>
<?php include_once('navbar.php'); ?>
<div class="wrapper">


 
 	<section class="container products">
 		
	  	<div class="grid">
	  		<?php for($i = 0; $i < 10; $i++ ) { ?>
			  <div class="col-sm-6 col-md-4 product">
			    <div class="thumbnail">
			      <img src="img/product-placeholder.jpg" alt="...">
			      <div class="caption">
			        <h3>Thumbnail label</h3>
			        <p>...</p>
			        <p>
			        	<a href="#" class="btn btn-primary" role="button"><i class="fa fa-eye"></i> View Product</a> 
			        	<a href="#" class="btn btn-default" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</a></p>
			      </div>
			    </div>
			  </div>
			<?php } ?>
	  	</div>
  </section>
</div>
<?php include_once('footer.php'); ?>