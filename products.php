<?php include_once('core/main.php'); ?>
<?php 
include_once('header.php');
include_once('navbar.php');

$products = $edb->select(array(
	'tblname' => 'product'
));

?>
<div class="wrapper">


 
 	<section class="container products">
 		
	  	<div class="grid">
	  		<?php while($row = $edb->getNext()){ ?>
	  			<div class="col-sm-6 col-md-4 product">
			    	<div class="thumbnail">
			      		<img src="img/product-placeholder.jpg" alt="...">
			      		<div class="caption">
			        		<h3><?php echo $row->product_name; ?></h3>
			        		<p><?php echo $row->product_description; ?></p>
			        		<p>
			        			<a href="<?php echo ROOT_URL; ?>/product.php?id=<?php echo $row->id;  ?>" class="btn btn-primary" role="button"><i class="fa fa-eye"></i> View Product</a> 
			        			<a href="<?php echo ROOT_URL; ?>cart.php?action=add&id=<?php echo $row->id; ?>" class="btn btn-default" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</a>
			        		</p>
			      		</div>
			    	</div>
			  	</div>
	  		<?php } ?>
	  	</div>
  </section>
</div>
<?php include_once('footer.php'); ?>